<?php
class Solution
{

    /**
     * @param String $s
     * @return String[]
     */
    public $res = [];

    public function restoreIpAddresses($s)
    {
        if (strlen($s) > 12) {
            return $this->res;
        }

        $this->restore($s, 4, "");
        return $this->res;
    }

    public function restore($s, $k, $ip_string)
    {
        if ($k == 0 && strlen($s) == 0) {
            $ip_string = rtrim($ip_string, ".");
            array_push($this->res, $ip_string);
            return;
        }
        for ($i = 1; $i <= 3; $i++) {
            if (strlen($s) >= $i && $this->valid(substr($s, 0, $i))) {
                $this->restore(substr($s, $i), $k - 1, $ip_string . substr($s, 0, $i) . ".");
            }
        }
    }

    public function valid($s)
    {
        if ($s == "" || (strlen($s) > 1 && $s[0] == "0")) {
            return false;
        }

        return $s >= 0 && $s <= 255;
    }
}
