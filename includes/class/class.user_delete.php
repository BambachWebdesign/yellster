<?php
namespace system;

class user_delete {
        public function delete_user($user_id) {
        $result = mysql_query("DELETE FROM `global`.`users` WHERE `user_id` = $user_id");
        return $result;
    }
    public function delete_options($user_id) {
        $result = mysql_query("DELETE FROM `global`.`options` WHERE `options_user_id` = $user_id");
        return $result;
    }
    public function delete_history($user_id) {
        $table = "history_".$user_id;
        $result = mysql_query("DROP TABLE `history`.$table");
        return $result;
    }
    public function delete_myYells($user_id) {
        $table = "myYells_".$user_id;
        $result = mysql_query("DROP TABLE `myYells`.$table");
        return $result;
    }
    public function delete_inbox($user_id) {
        $table = "inbox_".$user_id;
        $result = mysql_query("DROP TABLE `inbox`.$table");
        return $result;
    }
    public function delete_outbox($user_id) {
        $table = "outbox_".$user_id;
        $result = mysql_query("DROP TABLE `outbox`.$table");
        return $result;
    }
    public function delete_friendlist($user_id) {
        $table = "friendlist_".$user_id;
        $result = mysql_query("DROP TABLE `friendlist`.$table");
        return $result;
    }
    public function delete_friendlistgroups($user_id) {
        $table = "friendlist_groups_".$user_id;
        $result = mysql_query("DROP TABLE `friendlistgroups`.$table");
        return $result;
    }
    public function delete_usergroups($user_id) {
        $table = "groups_user_".$user_id;
        $result = mysql_query("DROP TABLE `usergroups`.$table");
        return $result;
    }
    public function delete_userinterests($user_id) {
        $table = "interests_user_".$user_id;
        $result = mysql_query("DROP TABLE `userinterests`.$table");
        return $result;
    }
}




?>