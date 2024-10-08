<?php

/*
  check_ceph_perf.php

  pnp4nagios template for the check_ceph_perf nagios python script.

  This file is part of nagios-ceph-perf

  nagios-ceph-perf is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  nagios-ceph-perf is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/

//Ceph OSD state graph
$opt[1] = "-T 55 -l 0 --vertical-label \"Ceph OSD Graph\"  --title \"Ceph OSD Graph " . $this->MACRO['DISP_HOSTNAME'] . ' / ' . $this->MACRO['DISP_SERVICEDESC'] . "\" ";
$ds_name[1]  = "Ceph OSDs";
$def[1] = "";

foreach ($this->DS as $KEY=>$VAL) {
	if (preg_match('/osdp_/i',$VAL['NAME']) == 1) {
		$def[1] .= rrd::def     ("var$KEY", $VAL['RRDFILE'], $VAL['DS'], "AVERAGE");
		$def[1] .= rrd::line2   ("var$KEY", rrd::color($KEY, 80) , rrd::cut($VAL['NAME'],16) );
		$def[1] .= rrd::gprint  ("var$KEY", array("AVERAGE", "LAST"));
	}
}
$def[1] .= rrd::comment("Ceph OSDs\\r");
$def[1] .= rrd::comment("Command " . $VAL['TEMPLATE'] . "\\r");


//Ceph total storage graph
$opt[2] = "-T 55 -l 0 --vertical-label \"Ceph Cluster Storage\"  --title \"Ceph Cluster Storage " . $this->MACRO['DISP_HOSTNAME'] . ' / ' . $this->MACRO['DISP_SERVICEDESC'] . "\" ";
$ds_name[2]  = "Ceph Cluster Storage";
$def[2] = "";

foreach ($this->DS as $KEY=>$VAL) {
	if (preg_match('/pg_bytes_/i',$VAL['NAME']) == 1) {
		$def[2] .= rrd::def     ("var$KEY", $VAL['RRDFILE'], $VAL['DS'], "AVERAGE");
		$def[2] .= rrd::line2   ("var$KEY", rrd::color($KEY, 80) , rrd::cut($VAL['NAME'],16) );
		$def[2] .= rrd::gprint  ("var$KEY", array("AVERAGE", "LAST"));
	}
}
$def[2] .= rrd::comment("Ceph Cluster Storage\\r");
$def[2] .= rrd::comment("Command " . $VAL['TEMPLATE'] . "\\r");

//Ceph cluster R/W
$opt[3] = "-T 55 -l 0 --vertical-label \"Ceph Cluster R/W\"  --title \"Ceph Cluster R/W " . $this->MACRO['DISP_HOSTNAME'] . ' / ' . $this->MACRO['DISP_SERVICEDESC'] . "\" ";
$ds_name[3]  = "Ceph Cluster R/W";
$def[3] = "";

foreach ($this->DS as $KEY=>$VAL) {
	if (preg_match('/pg_perf_[rw]/i',$VAL['NAME']) == 1) {
		$def[3] .= rrd::def     ("var$KEY", $VAL['RRDFILE'], $VAL['DS'], "AVERAGE");
		$def[3] .= rrd::line2   ("var$KEY", rrd::color($KEY, 80) , rrd::cut($VAL['NAME'],16) );
		$def[3] .= rrd::gprint  ("var$KEY", array("AVERAGE", "LAST"));
	}
}
$def[3] .= rrd::comment("Ceph Cluster R/W\\r");
$def[3] .= rrd::comment("Command " . $VAL['TEMPLATE'] . "\\r");

//Ceph cluster operations per second
$opt[4] = "-T 55 -l 0 --vertical-label \"Ceph Cluster Ops\"  --title \"Ceph Cluster Ops " . $this->MACRO['DISP_HOSTNAME'] . ' / ' . $this->MACRO['DISP_SERVICEDESC'] . "\" ";
$ds_name[4]  = "Ceph Cluster Ops";
$def[4] = "";

foreach ($this->DS as $KEY=>$VAL) {
	if (preg_match('/pg_perf_ops/i',$VAL['NAME']) == 1) {
		$def[4] .= rrd::def     ("var$KEY", $VAL['RRDFILE'], $VAL['DS'], "AVERAGE");
		$def[4] .= rrd::line2   ("var$KEY", rrd::color($KEY, 80) , rrd::cut($VAL['NAME'],16) );
		$def[4] .= rrd::gprint  ("var$KEY", array("AVERAGE", "LAST"));
	}
}
$def[4] .= rrd::comment("Ceph Cluster Ops\\r");
$def[4] .= rrd::comment("Command " . $VAL['TEMPLATE'] . "\\r");

//Ceph placement group states
$opt[5] = "-T 55 -l 0 --vertical-label \"Ceph PG States\"  --title \"Ceph PG States " . $this->MACRO['DISP_HOSTNAME'] . ' / ' . $this->MACRO['DISP_SERVICEDESC'] . "\" ";
$ds_name[5]  = "Ceph PG States";
$def[5] = "";

foreach ($this->DS as $KEY=>$VAL) {
	if (preg_match('/pgps_/i',$VAL['NAME']) == 1) {
		$def[5] .= rrd::def     ("var$KEY", $VAL['RRDFILE'], $VAL['DS'], "AVERAGE");
		$def[5] .= rrd::line2   ("var$KEY", rrd::color($KEY, 80) , rrd::cut($VAL['NAME'],16) );
		$def[5] .= rrd::gprint  ("var$KEY", array("AVERAGE", "LAST"));
	}
}
$def[5] .= rrd::comment("Ceph PG States\\r");
$def[5] .= rrd::comment("Command " . $VAL['TEMPLATE'] . "\\r");

?>
