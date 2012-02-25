<?php

class Collection_Timetable
{
    protected $arrData = array();
    
    public static function brokerAll()
    {
        return Collection_Timetable::brokerByID();
    }
    
    public static function brokerByID($date = null)
    {
        if ($date != null) {
            $date = date('Y-m-d', strtotime($date));
        }
        
        $this->arrData['Rooms'] = Object_Room::brokerAll();
        $this->arrData['Slots'] = Object_Slot::brokerAll();
        $this->arrData['Talks'] = Object_Talk::brokerAll();

        foreach($this->arrData['Rooms'] as $room) {
            $room->setFull(true);
            $this->arrData['Timetable']['Rooms'][$room->getKey('intRoomID')] = $room->getSelf();
        }
        foreach($this->arrData['Slots'] as $slot) {
            $slot->setFull(true);
            $this->arrData['Timetable']['Slots'][$slot->getKey('intSlotID')] = $slot->getSelf();
        }
        
        if (is_array($this->arrData['Rooms']) && is_array($this->arrData['Slots'])) {
            foreach ($this->arrData['Rooms'] as $room) {
                foreach ($this->arrData['Slots'] as $slot) {
                    if ($date == null || $slot->getKey('startDate') == $date) {
                        $this->arrData['Timetable']['Room_' . $room->getKey('intRoomID')]['Slot_' . $slot->getKey('intSlotID')] = $slot->getKey('intDefaultSlotTypeID');
                    }
                }
            }
        }
        
        if (is_array($this->arrData['Talks'])) {
            foreach ($this->arrData['Talks'] as $talk) {

                $talk->setFull(true);
                for ($slot = $talk->getKey('intSlotID'); $slot < $talk->getKey('intSlotID') + $talk->getKey('intLength'); $slot++) {
                    if ($date == null || $slot->getKey('startDate') == $date) {
                        $this->arrData['Timetable']['Room_' . $talk->getKey('intRoomID')]['Slot_' . $slot] = $talk->getSelf();
                    }
                }
            }
        }
        return $this->arrData;
    }
    
    public function getData()
    {
        return $this->arrData['Timetable'];
    }
}