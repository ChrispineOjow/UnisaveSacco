<?php

    require_once("../db.php");

    class MemberCredentials extends db{

        function checkCredentials($MemberId, $Email){

            $sql = "CALL `checkCredentials`({$MemberId},'{$Email}')";
            $this->getData($sql)->rowCount();

        }

        function saveCredentials($MemberId,$Email,$Name_,$Password_){

            if($this->checkCredentials($MemberId, $Email)){

                return ["status"=>"exists","message"=>"The Account Entered Already Exists"];

            }else{

                $sql="CALL `saveCredentials`({$MemberId},'{$Email}','{$Name_}','{$Password_}')";
                $this->getData($sql);
                return ["status"=>"success","message"=>"Member saved successfully"];

            }

        }

    }




?>