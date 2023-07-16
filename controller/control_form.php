<?php
    require_once("connect.php");
    class control_form extends connect {

        function getRooms() {
            $sql = "select count(*) as count from price
                    INNER JOIN type ON price.TypeID = type.ID
                    INNER JOIN room ON price.RoomID = room.ID";
            return $this->link->query($sql);
        }

        function getRoomsByButtons($limit, $offset) {
            $sql = "select NameRoom, NameType, NameQuantity, Price from price
                    INNER JOIN type ON price.TypeID = type.ID
                    INNER JOIN room ON price.RoomID = room.ID
                    ORDER BY TypeID, RoomID ASC LIMIT $limit OFFSET $offset";
            return $this->link->query($sql);       
        }

        function getTheRoomOfNumber() {
            $sql = "select count(*) as count from price";
            return $this->link->query($sql);
        }

        function getPagingRoom($limit, $offset) {
            $sql = "select * from price ORDER BY TypeID, RoomID ASC LIMIT $limit OFFSET $offset";
            return $this->link->query($sql);
        }

        function getRoomsByTime($typeID, $roomID) {
            $sql = "select NameRoom ,Checkin, Checkout FROM detailbook
            INNER JOIN book ON detailbook.Username = book.Name
            INNER JOIN price ON detailbook.RoomName = price.NameRoom
            WHERE RoomID = $roomID and TypeID = $typeID and Status = 1";
            return $this->link->query($sql);
        }
        function getCountRoomsByConditionNameRoom($typeID, $roomID, $array) {
            $sql = "select count(*) as count from price where TypeID = $typeID and RoomID = $roomID";
            if(!empty($array)) {
                $sql .= " and ";
                for($i = 0; $i < sizeof($array); $i++) {
                    $sql .= "NameRoom != " . "'$array[$i]'";
                    if($i != sizeof($array) - 1) $sql .= " and ";
                }
            }
            return $this->link->query($sql);
        }

        function getRoomsByConditionNameRoom($typeID, $roomID, $array, $limit, $offset) {
            $sql = "select * from price where TypeID = $typeID and RoomID = $roomID";
            if(!empty($array)) {
                $sql .= " and ";
                for($i = 0; $i < sizeof($array); $i++) {
                    $sql .= "NameRoom != " . "'$array[$i]'";
                    if($i != sizeof($array) - 1) $sql .= " and ";
                }
            }
            $sql .= " LIMIT $limit OFFSET $offset";
            return $this->link->query($sql);
        }

        function getCountRoomByID($typeID, $roomID) {
            $sql = "select count(*) as count from price where RoomID = $roomID and TypeID = $typeID";
            return $this->link->query($sql);
        }
        function getRoomByID($typeID, $roomID) {
            $sql = "select * from price where RoomID = $roomID and TypeID = $typeID";
            return $this->link->query($sql);
        }

        function getRoomsByID($typeID, $roomID, $limit, $offset) {
            $sql = "select * from price where RoomID = $roomID and TypeID = $typeID LIMIT $limit OFFSET $offset";
            return $this->link->query($sql);
        }

        function getRoomByCondition() {
            $sql = "select * from price
                    INNER JOIN type ON price.TypeID = type.ID
                    INNER JOIN room ON price.RoomID = room.ID";
            return $this->link->query($sql);
        }

        function getRoomByName($name) {
            $sql = "select * from price
                    INNER JOIN type ON price.TypeID = type.ID
                    INNER JOIN room ON price.RoomID = room.ID
                    where NameRoom = '$name'";
            return $this->link->query($sql);
        }

        function getInfoAdmin() {
            $sql = "select Fullname from account where Username = 'admin'";
            return $this->link->query($sql);
        }

        function getOrders() {
            $sql = "select * 
                    from account";
            return $this->link->query($sql);
        }

        function getCustomers() {
            $sql = "select * from book";
            return $this->link->query($sql);
        }

        function getStyleType() {
            $sql = "select * from type";
            return $this->link->query($sql);
        }

        function getQuantiyRoom() {
            $sql = "select * from room";
            return $this->link->query($sql);
        }

        function getAccount($username, $password) {
            $sql = "select * from account where Username = '$username' and Password = '$password'";
            return $this->link->query($sql);
        }

        function getUsername($username) {
            $sql = "select COUNT(*) as count from account where Username = '$username'";
            return $this->link->query($sql);
        }


        function getMoneyBill() {
            $sql = "select sum(total) as sum from bill where MONTH(Date) = 6";
            return $this->link->query($sql);
        }

        function getCountRoomBooked() {
            $sql = "select sum(Quantity) as sum from book where MONTH(BookDate) = 6";
            return $this->link->query($sql);
        }

        function getCountRoomBookedButCanceled() {
            $sql = "select sum(Quantity) as sum from book where MONTH(BookDate) = ". date("m") - 1 ." and Status = 0";
            return $this->link->query($sql);            
        }
        function getCustomerRoomBookedButCanceled() {
            $sql = "select Name, FullName, BookDate, Quantity, Rooms from book where MONTH(BookDate) = ". date("m") - 1 ." and Status = 0";
            return $this->link->query($sql);            
        }

        //information

        function getBookedPersonal($username) {
            $sql = "select * from book where name = '$username' and  MONTH(BookDate) = ". date("m") - 1 ." and Status = 2";
            return $this->link->query($sql);           
        }

        function getBooked($username) {
            $sql = "select * from book where name = '$username' and  Status = 1 ";
            return $this->link->query($sql);           
        }

        function updateStatus($id) {
            $sql = "update book SET Status = 0 Where ID = $id";
            $this->link->query($sql);
        }


        //insert data
        function insertAccount($records) {
            $sql = "insert into account (Username, Password, Fullname, Dateofbirth, Phonenumber, RoleID)
            VALUES(";
            foreach($records as $value) {
                $sql .= "'$value'" . ",";
            }
            $sql .= "3)";
            $this->link->query($sql);
        }
        function insertBook($record) {
            $sql = "insert into book (Name, Fullname, Checkin, Checkout, BookDate, Status, Quantity, Deposit, Rooms)
                    VALUES(";
            for($i = 0; $i < count($record); $i++) {
                if($i != count($record) - 1)
                    if(gettype($record[$i]) == "string")
                        $sql .= "'$record[$i]'" . ",";
                    else
                        $sql .= "$record[$i]" . ",";
                else
                    if(gettype($record[$i]) == "string")
                        $sql .= "'$record[$i]'" . ")";
                    else
                        $sql .= "$record[$i]" . ")";
            }
            $this->link->query($sql);
        }

        function insertDetailBook($record) {
            $sql = "insert into detailbook (Username, RoomName, PriceRoom)
                    VALUES(";
            for($i = 0; $i < count($record); $i++) {
                if($i != count($record) - 1)
                    $sql .= "'$record[$i]'" . ",";
                else
                    $sql .= "'$record[$i]'" . ")";
            }
            $this->link->query($sql);
        }
        //api
        function insertRoom($records) {
            $sql = "insert into price (NameRoom, TypeID, RoomID, Price, Image, VIP) VALUES(";
            foreach($records as $value) {
                if(gettype($value) == 'string')
                    $sql .= "'$value'" . ",";
                else 
                    $sql .= "$value" . ",";
            }
            $sql = rtrim($sql, $sql[-1]);
            $sql .= ")";
            $this->link->query($sql);
        }

        function updateRoom($records) {
            $temp = "update price 
            SET NameRoom = , TypeID = , RoomID = , Price = , Image = , VIP = 
            where NameRoom = ";
            $sql = "";
            $room = ['NameRoom', 'TypeID', 'RoomID', 'Price', 'Image', 'VIP', 'Room'];
            $idx = 0;
            for($i = 0; $i < strlen($temp); $i++) {
                $sql .= $temp[$i];
                if($temp[$i] == '=') {
                    if(gettype($records[$room[$idx]]) == "string")
                        $sql .= "'" . $records[$room[$idx++]] . "'";
                    else
                        $sql .= $records[$room[$idx++]];
                }
            }
            $this->link->query($sql);
        }

        function deleteRoom($record) {
            $sql = "delete from price where NameRoom = '$record'";
            $this->link->query($sql);
        }
        
    }

?>