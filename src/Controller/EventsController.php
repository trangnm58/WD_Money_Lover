<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{

    public function addEvent( Event $newEvent)
    {
    	$eventTable = new EventsTable();
    	if ($eventTable.insert($newEvent)) {
    		return $newEvent.getId();
    	} else {
    		return false;
    	}
    }

    public function updateEventInfo(Event $event)
    {
    	$eventTable = new EventsTable();
    	if ($eventTable.update($event)) {
    		return true;
    	} else {
    		return false;
    	}

    }

    /**
     * Removes a Event object as a record from events table in moneylover database
     * @param id of a event
     * @return id of event object removed successfully
     */
    public function removeEvent($_id)
    {
    	$eventTable = new EventsTable();
    	if ($eventTable.remove($_id)) {
    		return $_id;
    	} else {
    		return false;
    	}
    }

    public function viewEvents($customer_id)
    {
    	$conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $query = "SELECT id FROM events where customer_id = $_customer_id";
            $result = mysql_query($query,$conn);
            $arrId_Event = array();
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            	array_push($arrId_Event, $row);
            }
            mysql_free_result($result);
            return $arrId_Event;
        }
    }
}
