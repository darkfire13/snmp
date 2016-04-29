<?php

/* Run script:
 * php snmp1.php -h 192.168.22.9
 */


$community = 'public'; // default 'public'
$opt = getopt("h:");

echo "\nSNMPv2-MIB::sysContact.0 - Device contact details\n";
//print_r(snmp2_real_walk($opt['h'], $community, "SNMPv2-MIB::sysContact.0"));
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysContact.0"));

echo "\nSNMPv2-MIB::sysDescr.0 - Device description\n";
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysDescr.0"));

echo "\nSNMPv2-MIB::sysLocation.0 - Device location\n";
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysLocation.0"));

echo "\nSNMPv2-MIB::sysName.0 - Device name\n";
echo(snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysName.0"));

echo "\nSNMPv2-MIB::sysUpTime.0 - Device uptime\n";
echo (snmp2_get($opt['h'], $community, "SNMPv2-MIB::sysUpTime.0"));

echo "\nIF-MIB::ifNumber.0 - Number of network interfaces\n";
echo (snmp2_get($opt['h'], $community, "IF-MIB::ifNumber.0"));

//echo "\nIF-MIB::ifName - The textual name of the interface.\n";
//print_r(snmp2_real_walk($opt['h'], $community, "IF-MIB::ifName"));
//print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.31.1.1.1.1"));
echo "\nIF-MIB::ifDescr информация об интерфейсах устройства\n";
print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.2.2.1.2"));

echo "\nIF-MIB::ifInOctets Полное число полученных байтов, включая символы заголовков.\n";
print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.2.2.1.10"));
echo "\nIF-MIB::ifOutOctets Полное количество отправленных октетов с интерфейса, включая символы заголовков.\n";
print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.2.1.2.2.1.16"));

//echo "\nMIBs of Private Enterprise Codes e.g. D-Link (171), Cisco(9), Microsoft (311). \n";
//print_r(snmp2_real_walk($opt['h'], $community, "1.3.6.1.4.1"));


/*
  Ip Adress для DAP 2360 A1
  snmpwalk -v 2c -c luxorpub 192.168.22.9 1.3.6.1.4.1.171.10.37.40.2.1.1.1.1.2.1


 */
?>
