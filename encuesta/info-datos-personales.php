<?php
/* Opciones para la captura de datos personales 
   actualizar con las nuevas carreras en produccion
   */
   
$procedenciaA = array();
$procedenciaA[0] = "For&aacute;neo";
$procedenciaA[1] = "Local";
$procedenciaA[2] = " ";//para que sirve la procedencia nula ?
$procedenciaD = 1;
$procedenciaN = 3;

$estadoA = array();
$estadoA[0] = "Fuera de M&eacute;xico";
$estadoA[1] = "Aguascalientes";
$estadoA[2] = "Baja California";
$estadoA[3] = "Baja California Sur";
$estadoA[4] = "Campeche";
$estadoA[5] = "Coahuila de Zaragoza";
$estadoA[6] = "Colima";
$estadoA[7] = "Chiapas";
$estadoA[8] = "Chihuahua";
$estadoA[9] = "CDMX";// Se actualiza nombre"Distrito Federal";
$estadoA[10] = "Durango";
$estadoA[11] = "Guanajuato";
$estadoA[12] = "Guerrero";
$estadoA[13] = "Hidalgo";
$estadoA[14] = "Jalisco";
$estadoA[15] = "M&eacute;xico";
$estadoA[16] = "Michoac&aacute;n de Ocampo";
$estadoA[17] = "Morelos";
$estadoA[18] = "Nayarit";
$estadoA[19] = "Nuevo Le&oacute;n";
$estadoA[20] = "Oaxaca";
$estadoA[21] = "Puebla";
$estadoA[22] = "Quer&eacute;taro";
$estadoA[23] = "Quintana Roo";
$estadoA[24] = "San Luis Potos&iacute;";
$estadoA[25] = "Sinaloa";
$estadoA[26] = "Sonora";
$estadoA[27] = "Tabasco";
$estadoA[28] = "Tamaulipas";
$estadoA[29] = "Tlaxcala";
$estadoA[30] = "Veracruz de Ignacio de la Llave";
$estadoA[31] = "Yucat&aacute;n";
$estadoA[32] = "Zacatecas";
$estadoD = 19;
$estadoN = 33;

$vivesenA = array();
$vivesenA[0] = "Residencias";
$vivesenA[1] = "Departamento";
$vivesenA[2] = "En casa con mi familia";
$vivesenA[3] = "Casa particular";
$vivesenA[4] = "Casa rentada";
$vivesenA[5] = "Otra";
$vivesenD = 2;
$vivesenN = 6;

$estadocivilA = array();
$estadocivilA[0] = "Soltera(o)";
$estadocivilA[1] = "Casada(o)";
$estadocivilA[2] = "Uni&oacute;n Libre";
$estadocivilA[3] = "Divorciada(o)";
$estadocivilA[4] = "Viuda(o)";
$estadocivilA[5] = "Otra(o)";
$estadocivilD = 0;
$estadocivilN = 6;

$sexoA = array();
$sexoA[0] = "Mujer";
$sexoA[1] = "Hombre";
$sexoD = 1;
$sexoN = 2;

$generoA = array();
$generoA[0] = "Femenino";
$generoA[1] = "Masculino";
$generoA[2] = "Otro";
$generoD = 1;
$generoN = 3;


$estudiosA = array();
$estudiosA[0] = "Preparatoria";
$estudiosA[1] = "Carrera";
$estudiosA[2] = "Posgrado";
$estudiosA[3] = "Otro";
$estudiosD = 0;
$estudiosN = 4;

$preparatoriaorigenA = array();
$preparatoriaorigenA[0] = "Preparatoria_Tec";
$preparatoriaorigenA[1] = "Preparatoria_Particular_pero_no_Tec";
$preparatoriaorigenA[2] = "Preparatoria_Publica";
$preparatoriaorigenD = 0;
$preparatoriaorigenN = 3;

$carreraA = array();
$carreraA[0]="-Escoger-";
$carreraA[1]="LAE Licenciado en administraci&oacute;n y estrategia de negocios";
$carreraA[2]="LAF: Licenciado en administraci&oacute;n financiera";
$carreraA[3]="LCPF: Licenciado en contadur&iacute;a p&uacute;blica y finanzas";
$carreraA[4]="LCDE: Licenciado en creaci&oacute;n y desarrollo de empresas";
$carreraA[5]="LLN: Licenciado en log&iacute;stica internacional";
$carreraA[6]="LEM: Licenciado en mercadotecnia";
$carreraA[7]="LMC: Licenciado en mercadotecnia y comunicaci&oacute;n";
$carreraA[8]="LIN: Licenciado en negocios internacionales";
$carreraA[9]="LPO: Licenciado en psicolog&iacute;a organizacional";
$carreraA[10]="LPM: Licenciado en publicidad y comunicaci&oacute;n de mercados";
$carreraA[11]="IID: Ingeniero en innovaci&oacute;n y desarrollo";
$carreraA[12]="IC: Ingeniero civil";
$carreraA[13]="IDA: Ingeniero en dise&ntilde;o automotriz";
$carreraA[14]="IMT: Ingeniero en mecatr&oacute;nica";
$carreraA[15]="IFI: Ingeniero f&iacute;sico industrial";
$carreraA[16]="IIS: Ingeniero industrial y de sistemas";
$carreraA[17]="IMA: Ingeniero mec&aacute;nico administrador";
$carreraA[18]="IME: Ingeniero mec&aacute;nico electricista";
$carreraA[19]="LCMD: Licenciado en comunicaci&oacute;n y medios digitales";
$carreraA[20]="LAD: Licenciado en animaci&oacute;n y arte digital";
$carreraA[21]="IMI: Ingeniero en producci&oacute;n musical digital";
$carreraA[22]="LLE: Licenciado en letras hisp&aacute;nicas";
$carreraA[23]="LMI: Licenciado en periodismo y medios de informaci&oacute;n";
$carreraA[24]="LP: Licenciado en psicolog&iacute;a";
$carreraA[25]="LTS: Licenciado en transformaci&oacute;n social";
$carreraA[26]="LPL: Licenciado en ciencia pol&iacute;tica";
$carreraA[27]="LED: Licenciado en derecho";
$carreraA[28]="LDP: Licenciado en derecho y ciencia pol&iacute;tica";
$carreraA[29]="LDF: Licenciado en derecho y finanzas";
$carreraA[30]="LEC: Licenciado en econom&iacute;a";
$carreraA[31]="LEF: Licenciado en econom&iacute;a y finanzas";
$carreraA[32]="LRI: Licenciado en relaciones internacionales";
$carreraA[33]="ITI: Ingeniero en tecnolog&iacute;as de informaci&oacute;n";
$carreraA[34]="INT: Ingeniero en negocios y tecnolog&iacute;as de informaci&oacute;n";
$carreraA[35]="ISC: Ingeniero en sistemas computacionales";
$carreraA[36]="ISDR: Ingeniero en sistemas digitales y rob&oacute;tica";
$carreraA[37]="ITC: Ingeniero en tecnolog&iacute;as computacionales";
$carreraA[38]="ITE: Ingeniero en tecnolog&iacute;as electr&oacute;nicas";
$carreraA[39]="ITS: Ingeniero en telecomunicaciones y sistemas electr&oacute;nicos";
$carreraA[40]="IBT: Ingeniero en biotecnolog&iacute;a";
$carreraA[41]="IA: Ingeniero agr&oacute;nomo";
$carreraA[42]="IMD: Ingeniero biom&eacute;dico";
$carreraA[43]="IBN: Ingeniero en bionegocios";
$carreraA[44]="IDS: Ingeniero en desarrollo sustentable";
$carreraA[45]="IIA: Ingeniero en industrias alimentarias";
$carreraA[46]="INCQ: Ingeniero en nanotecnolog&iacute;a y ciencias qu&iacute;micas";
$carreraA[47]="IQA: Ingeniero qu&iacute;mico administrador";
$carreraA[48]="IQP: Ingeniero qu&iacute;mico en procesos sustentables";
$carreraA[49]="LDI: Licenciado en dise&ntilde;o industrial";
$carreraA[50]="LAD: Licenciado en animaci&oacute;n y arte digital";
$carreraA[51]="ARQ: Arquitecto";
$carreraA[52]="LBC: Licenciado en biociencias";
$carreraA[53]="LNB: Licenciado en nutrici&oacute;n y bienestar integral";
$carreraA[54]="LPS: Licenciado en psicolog&iacute;a cl&iacute;nica y de la salud";
$carreraA[55]="MC: M&eacute;dico cirujano";
$carreraA[56]="MO: M&eacute;dico cirujano odont&oacute;logo";
$carreraA[57]="Otra carrera";
$carreraD = 0;
$carreraN = 58;

$campusA = array();
$campusA[0] = "---";
$campusA[1] = "Campus Monterrey";
$campusA[2] = "Campus Guadalajara";
$campusA[3] = "Campus Puebla";
$campusA[4] = "Campus Toluca";
$campusA[5] = "Campus Estado de México";
$campusA[6] = "Campus Ciudad de México";
$campusA[7] = "Campus Queretaro";
$campusD = 1;
$campusN = 8;

$edadA = array();
$edadA[0] = "menos de 18";
$edadA[1] = "18";
$edadA[2] = "19";
$edadA[3] = "20";
$edadA[4] = "21";
$edadA[5] = "22";
$edadA[6] = "23";
$edadA[7] = "24";
$edadA[8] = "25";
$edadA[9] = "26";
$edadA[10] = "27";
$edadA[11] = "28";
$edadA[12] = "29";
$edadA[13] = "30";
$edadA[14] = "m&aacute;s de 30";
$edadD = 0;
$edadN = 15;


$tienesbecaA = array();
$tienesbecaA[0] = "No";
$tienesbecaA[1] = "S&iacute;";
$tienesbecaD = 0;
$tienesbecaN = 2;

$tipobecaA = array();
$tipobecaA[0] = "No";
$tipobecaA[1] = "Beca con porcentaje";
$tipobecaA[2] = "Excelencia";
$tipobecaA[3] = "Cr&eacute;dito";
$tipobecaA[4] = "Tradicional";
$tipobecaA[5] = "Por empleado";
$tipobecaA[6] = "Deportiva EDF";
$tipobecaA[7] = "Deportiva FBA";
$tipobecaA[8] = "Otras";
$tipobecaD = 0;
$tipobecaN = 9;

$trabajaA = array();
$trabajaA[0] = "No";
$trabajaA[1] = "S&iacute;";
$trabajaD = 0;
$trabajaN = 2;

$tieneactividadextraacademicaA = array();
$tieneactividadextraacademicaA[0] = "No";
$tieneactividadextraacademicaA[1] = "S&iacute;";
$tieneactividadextraacademicaD = 0;
$tieneactividadextraacademicaN = 2;

$religionA = array();
$religionA[0] = "No";
$religionA[1] = "S&iacute;";
$religionA[2] = "No s&eacute;";
$religionD = 1;
$religionN = 3;

$actividadespiritualA = array();
$actividadespiritualA[0] = "No";
$actividadespiritualA[1] = "S&iacute;";
$actividadespiritualD = 0;
$actividadespiritualN = 2;

$procedencia = $procedenciaD;
$estadocivil = $estadocivilD;
$sexo = $sexoD;
$genero = $generoD;
$estudios = $estudiosD;
$estado = $estadoD;
$carrera = $carreraD;
$vivesen = $vivesenD;
$tienesbeca = $tienesbecaD;
$tipobeca = $tipobecaD;
$trabaja = $trabajaD;
$tieneactividadextraacademica = $tieneactividadextraacademicaD;
$religion = $religionD;
$actividadespiritual = $actividadespiritualD;

$cualextraacademica = "";
$cualreligion = "";
$enquetrabaja = "";
$cualactividadespiritual = "";
$edad=$edadA;
$campus = "";
$preparatoriaorigen = $preparatoriaorigenD;
?>