<?php

/* Run script:
 * php snmp_info_device.php -h 192.168.22.9
 * php snmp_info_device.php -h 192.168.22.9 -c your_community
 */


$community = 'public'; // default 'public'
$opt = getopt("h:c:");

if (!empty($opt['c']))
    $community = $opt['c'];

echo "\nSNMPv2-MIB::sysContact.0 - Device contact details\n";
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysContact.0"));

echo "\nSNMPv2-MIB::sysDescr.0 - Device description\n";
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysDescr.0"));

echo "\nSNMPv2-MIB::sysLocation.0 - Device location\n";
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysLocation.0"));

echo "\nSNMPv2-MIB::sysName.0 - Device name\n";
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysName.0"));

echo "\nSNMPv2-MIB::sysUpTime.0 - Device uptime\n";
echo (snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysUpTime.0"));

// Interfaces
echo "\nIF-MIB::ifNumber.0 - Number of network interfaces\n";
echo (snmp2_get($opt['h'], $community, "IF-MIB::ifNumber.0"));

echo "\nIF-MIB::ifDescr A textual string containing information about the interface\n";
print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.2.2.1.2"));

echo "\nIF-MIB::ifInOctets The total number of octets received on the interface, including framing characters.\n";
print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.2.2.1.10"));

echo "\nIF-MIB::ifOutOctets The total number of octets transmitted out of the interface, including framing characters.\n";
print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.2.2.1.16"));


//echo "\nIF-MIB::ifName - The textual name of the interface.\n";
//print_r(snmp2_real_walk($opt['h'], $community, "IF-MIB::ifName"));
//print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.31.1.1.1.1"));

//echo "\nMIBs of Private Enterprise Codes e.g. D-Link (171), Cisco(9), Microsoft (311). \n";
//print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.4.1"));


/*
  Ip Adress для DAP 2360 A1
  snmpwalk -v 2c -c luxorpub 192.168.22.9 1.3.6.1.4.1.171.10.37.40.2.1.1.1.1.2.1

 */
?>
