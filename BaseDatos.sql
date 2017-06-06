create table usuario(
cedula int not null primary key,
nombre varchar(100) not null,
pais varchar(100) not null,
correo varchar(100) null,
ciudad varchar(100) not null,
codigo int null,
telefono varchar(100) not null,
t_usuario varchar(100) not null);

create table producto(
id_producto int not null primary key,
nombre varchar(100) not null,
precio varchar (100) not null,
categoria varchar(100) not null,
foto varchar (100) not null);

create table detalle(
id_detalle int not null primary key,
fabricante varchar(100) not null,
caracteristica varchar(100000) not null,
id_producto int not null,
foreign key (id_producto) references producto (id_producto) on delete cascade on update cascade);

create table stock(
id_stock int not null primary key,
cantidad varchar (100) not null,
disponibilidad varchar (100) not null,
id_producto int not null,
foreign key (id_producto) references producto (id_producto) on delete cascade on update cascade);

create table factura(
id_factura int not null primary key,
nombrepro varchar(100) not null,
preciopro varchar(100) not null,
total varchar(100) not null,
cedula int not null,
foreign key (cedula) references usuario (cedula) on delete cascade on update cascade);

create table carrito(
id_carrito int not null auto_increment primary key,
id_producto int not null,
foreign key (id_producto) references producto (id_producto) on delete cascade on update cascade);


create table categoria(
	id_categoria int not null auto_increment primary key,
	nombre varchar(40) not null);

INSERT INTO categoria (nombre) VALUES ('Memoria ram');
INSERT INTO categoria (nombre) VALUES ('Motherboard');
INSERT INTO categoria (nombre) VALUES ('Tarjeta de Video');
INSERT INTO categoria (nombre) VALUES ('Disco Duro');
INSERT INTO categoria (nombre) VALUES ('Procesadores');
INSERT INTO categoria (nombre) VALUES ('Gabinete');
INSERT INTO categoria (nombre) VALUES ('Disipador');


INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('10', 'Memoria DDR4 Kingston HyperX Fury PC4-19200 (2400MHz) 8GB', '$259,000', '1', 'images/10.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1000', 'Kingston', 'Rendimiento: PC4-19200 (2400MHz) Dual / Quad Channel.
Latencias: CL14-15. 
Voltaje: 1,2V. 
Caracteristicas Especiales: 
Pin Out: 288. 
Pin Format: Unbuffered DIMM.', '10');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10000', '4', 'si', '10');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('11', 'Memoria DDR3 Corsair Vengeance PC3-12800 (1600MHz) 4GB', '$95,000', '1', 'images/11.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1001', 'Corsair', 'Rendimiento: PC3-12800 (1600MHz).
Latencias: CAS LATENCY 9.
Voltaje: 1.5V.
Caracteristicas Especiales: Pasive cooler system.', '11');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10001', '4', 'si', '11');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('12', 'Memoria DDR3 Kingston HyperX Fury PC3-12800 (1600MHz) 4GB Azul', '$110,000', '1', 'images/12.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1002', 'Kingston', 'Rendimiento: PC3-12800 (1600MHz).
Latencias: CAS LATENCY 9.
Voltaje: 1,5V – 1,65V.
Caracteristicas Especiales: Pasive cooler system.', '12');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10002', '4', 'si', '12');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('13', 'Memoria DDR3 Corsair XMS3 PC3-12800 (1600MHz) 4GB', '$93,000', '1', 'images/13.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1003', 'Corsair', 'Rendimiento: PC3-12800 (1600MHz).
Latencias: CAS LATENCY 9.
Voltaje: 1.5V.
Caracteristicas Especiales: 2 Rank Double-sided module pasive cooler system.', '13');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10003', '4', 'si', '13');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('14', 'Motherboard AMD ASUS CROSSHAIR V FORMULA-Z AM3+', '$842,000', '2', 'images/14.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1004', 'ASUS', 'CPU: AMD AM3+ FX/Phenom II/Athlon II/Sempron 100 Series Soporte para AM3+ 32 nm CPU Soporte para CPU hasta 8 nucleos Soporte para CPU hasta 140 W AMD Cool Quiet Technology.
Chipset: AMD 990FX/SB950.
Memoria: 4 x DIMM, Max. 32GB, DDR3 2400(O.C.)/2133(O.C.)/2000(O.C.)/1800(O.C.)/1600/1333/1066 MHz ECC, Non-ECC, Un-buffered Memory Arquitectura de memoria Dual Channel.
Bios: 64Mb Flash ROM, UEFI BIOS, PnP, DMI2.0, WfM2.0, SM BIOS 2.5, ACPI2.0a, Multi-Language BIOS.
Audio: SupremeFX III built-in 8-Channel High Definition Audio CODEC - Soporte de: Jack-detection, Multi-streaming, Front Panel Jack-retasking Caracteristicas de audio: - SupremeFX Shielding Technology - 1500 uF Audio Power Capacitor - Gold-plated jacks - Blu-ray audio layer Content Protection - DTS Ultra PC II - DTS Connect - Puerto de salida optico S/PDIFen panel trasero.
LAN: Intel, 1 x Gigabit LAN Controller.
Slots: 3 x PCIe 2.0 x16 (dual x16 or x16/x8/x8) 1 x PCIe 2.0 x16 (x4 mode) 2 x PCIe 2.0 x1.
Conectores: 1 conector USB 3.0 con soporte adicional de 2 puertos USB 3.0 2 conectores USB 2.0 con soporte adicional de 4 puertos USB 2.0 1 Conector TPM 8 conectores SATA 6Gb/s 2 conectores para CPU fan 3 conectores para chassis fan 3 conectores para optional fan 1 S/PDIF Out header 1 Conector de alimentacion 24-pin EATX 1 8-pin ATX 12V 1 4-pin ATX 12V 1 conector de sonido del panel frontal (AAFP) 1 Sistema de panel 1 DirectKey Button 1 DRCT header 8 Puntos de Medicion ProbeIt 3 conectores de sensor termico 1 conector EZ Plug (4-pin conector de alimentacion Molex) 1 boton de encendido 1 Boton de restauracion 1 Go Button.
Panel Trasero I/O: 1 x PS / 2 para teclado/mouse 2 x eSATA 6Gb/s 1 x puerto LAN (RJ45) 4 x USB 3.0 8 x USB 2.0 (un puerto puede ser cambiado a ROG Connect) 1 x Salida S/PDIF 6 x audio jacks 1 x boton Clear CMOS 1 x ROG Connect On/Off switch.' , '14');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10004', '4', 'si', '14');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('15', 'Motherboard AMD ASUS M5A78L-M/USB3 AM3+', '$227,000', '2', 'images/15.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1005', 'ASUS', 'CPU	AMD AM3+ FX/Phenom II/Athlon II/Sempron 100 Series Processors Supports CPU up to 140 W AMD Cool Quiet Technology
Chipset	AMD 760G (780L)/SB710
Memoria	4 x DIMM, Max. 32GB, DDR3 2000(O.C.)/1866(O.C.)/1800(O.C.)/1600(O.C.)/1333/1066 MHz ECC, Non-ECC, Un-buffered Memory Dual Channel Memory Architecture
Bios	16 Mb Flash ROM, AMI BIOS, PnP, DMI v2.0, WfM2.0, SM BIOS V2.5, ACPI V2.0a
Chip Grfico	Integrated ATI Radeon HD 3000 GPU Multi-VGA output support : HDMI/DVI/RGB ports
Audio	VIA VT1708S 8-Channel High Definition Audio CODEC
LAN	Realtek, 1 x Gigabit LAN Controller(s)
Slots	1 x PCIe x16 1 x PCIe x1 2 x PCI
Conectores	3 x USB 2.0 connector(s) support(s) additional 6 USB 2.0 port(s) 1 x COM port(s) connector(s) 6 x SATA 3Gb/s connector(s) 1 x CPU Fan connector(s) 1 x Chassis Fan connector(s) 1 x S/PDIF out header(s) 1 x 24-pin EATX Power connector(s) 1 x 4-pin ATX 12V Power connector(s) 1 x parallel port connector(s) 1 x Front panel audio connector(s) (AAFP) 1 x System panel(s)
Panel Trasero I/O	1 x PS/2 keyboard/mouse combo port(s) 1 x DVI 1 x D-Sub 1 x HDMI 1 x LAN (RJ45) port(s) 2 x USB 3.0 4 x USB 2.0 1 x Optical S/PDIF out 6 x Audio jack(s)
Caracteristicas Especiales	AM3+ CPU Support Ready Turbo Key- Touch-n-Boost! ASUS EPU- System Level Energy Saving Anti-Surge-Full-time Power Guardian-Make System Free From Risk Core Unlocker-Unleash True Core Performance Intelligently ALL solid capacitor - 100% All High-quality Conductive Polymer Capacitors
S.O.	Compatible con Microsoft de Windows 8/8 64-bit 7/7 de 64-bit / Vista / Vista  64-bit
Factor de Forma	uATX Form Factor 9.6 inch x 9.6 inch ( 24.4 cm x 24.4 cm )' , '15');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10005', '4', 'si', '15');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('16', 'Motherboard AMD ASUS 970 PRO GAMING/AURA AM3+', '$408,000', '2', 'images/16.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1006', 'ASUS', 'CPU	integrada AMD AM3+ FX/Phenom II/Athlon II/Sempron 100 Series Processors Soporta CPU AM3+ 32 nm Soporta CPU hasta 125 W AMD Cool Quiet Technology
Chipset	AMD 970/SB950
Memoria	4 x Memoria DIMM, Max. 32GB, DDR3 2133(O.C.)/1866/1600/1333/1066 MHz Non-ECC, Un-buffered Arquitectura de memoria Dual Channel
Bios	128 Mb Flash ROM, UEFI AMI BIOS, PnP, DMI3.0, WfM2.0, SM BIOS 3.0, ACPI 5.0, BIOS multilinge, ASUS EZ Flash 3, CrashFree BIOS 3, F11 EZ Tuning Wizard, F6 Qfan Control, F3 Mis favoritos, Notas rapidas, ultimos registros, F12 PrintScreen e informacion de memoria ASUS DRAM SPD (Serial Presence Detect)
Chip Gr�fico	N/A
Audio	SupremeFX 8 canales CODEC de audio de alta definicion - Compatible con: Jack-detection, Multi-streaming, Front Panel MIC Jack-retasking Caracter�sticas de audio: - SupremeFX Shielding Technology - Salida S/PDIF optica en panel trasero - Sonic Radar II alta calidad 115 dB salida SNR stereo playback
LAN	Intel I211-AT, 1 x Controladora de red Gigabit, GameFirst technology LANGuard: proteccion contra sobrecarga
Slots	2 x PCIe 2.0 x16 (x16 o dual x8) 2 x PCIe 2.0 x1 2 x PCI
Conectores	1 x Conector(es) USB 3.0 soporta(n) 2 USB 3.0 extra(s) (19 contactos) 1 x ReTry jumper 3 x Conector(es) USB 2.0 soporta(n) 6 USB 2.0 extra 1 x Safe Boot jumper 1 x Conector(es) COM 1 x M.2 Socket 3 for M Key, type 2242/2260/2280 devices 6 x Conector(es) SATA 6Gb/s 1 x Cabezal TPM 1 x Conector(es) ventilador de CPU (1 x 4 -pin) 3 x Conector(es) ventilador chasis (3 x 4 -pin) 1 x Conector Ventilador CPU OPT (1 x 4 -pin) 1 x Conector de alimentaci�n EATX de 24 contactos 1 x Conector de alimentacion ATX 12V de 8 contactos 1 x Conector de audio en panel frontal (AAFP) 1 x Paneles del sistema 1 x Jumper Clear CMOS 1 x Cabezal bombeo l�quido 1 x Jumper Modo lento
Panel Trasero I/O	1 x Puerto combo teclado/raton PS/2 1 x Red (RJ45) 1 x Salida S/PDIF optica 6 x Jack(s) de audio 2 x USB 3.1 (rojo)Tipo A 8 x USB 2.0
Caracter�sticas Especiales	Gamer Guardian: - ESD Guards en LAN, Audio, KBMS y puertos USB3.0/2.0 - DRAM Overcurrent Protection - Protecci�n posterior de E/S de acero inoxidable - DIGI+ VRM Caracter�sticas exclusivas ASUS : - AI Suite 3 - Ai Charger+ - USB 3.1 Boost - Disk Unlocker Soluciones t�rmicas ASUS : - ASUS Fan Xpert 2 ASUS EZ DIY : - ASUS O.C. Tuner - ASUS CrashFree BIOS 3 - ASUS EZ Flash 2 - ASUS UEFI BIOS EZ Mode - Push Notice ASUS Q-Design : - ASUS Q-Shield - ASUS Q-LED (CPU, DRAM, VGA, LED indicador de arranque de dispositivo) - ASUS Q-Slot - ASUS Q-DIMM Media Streamer RAMCache AURA: RGB Lighting Control
S.O.: Windows 10
Factor de Forma: ATX ( 30.5 cm x 24.4 cm )' , '16');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10006', '4', 'si', '16');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('17', 'Motherboard AMD ASUS M5A99FX PRO R2.0 AM3+', '$489,000', '2', 'images/17.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1007', 'ASUS', 'CPU	AMD AM3+ FX�/Phenom� II/Athlon� II/Sempron� 100 Series Processors Supports AM3+ 32 nm CPU Supports CPU up to 8 cores Supports CPU up to 140 W AMD Cool Quiet� Technology
Chipset	AMD 990FX/SB950
Memoria	4 x DIMM, Max. 32GB, DDR3 2133(O.C.)/1866/1600/1333/1066 MHz ECC, Non-ECC, Un-buffered Memory Dual Channel Memory Architecture
Bios	64 Mb Flash ROM, UEFI BIOS, PnP, DMI2.0, WfM2.0, SM BIOS 2.7, ACPI 2.0a, Multi-language BIOS, ASUS EZ Flash 2
Chip Gr�fico	N/A
Audio	Realtek� ALC892 8-Channel High Definition Audio CODEC - Supports : Jack-detection, Multi-streaming, Front Panel Jack-retasking Audio Feature : - Absolute Pitch 192kHz/ 24-bit True BD Lossless Sound - Blu-ray audio layer Content Protection - DTS Ultra PC II - DTS Connect - ASUS Noise Filter - Optical S/PDIF out port(s) at back panel
LAN	Realtek� 8111F, 1 x Gigabit LAN Controller(s)
Slots	2 x PCIe 2.0 x16 (dual x16) 2 x PCIe 2.0 x16 (x4 mode, black) 1 x PCIe 2.0 x1 1 x PCI
Conectores	1 x USB 3.0 connector(s) support(s) additional 2 USB 3.0 port(s) (19-pin) 3 x USB 2.0 connector(s) support(s) additional 6 USB 2.0 port(s) 1 x TPM connector(s) 1 x COM port(s) connector(s) 7 x SATA 6Gb/s connector(s) 1 x CPU Fan connector(s) (4 -pin) 1 x CPU OPT Fan connector(s) (4 -pin) 3 x Chassis Fan connector(s) (4 -pin) 1 x S/PDIF out header(s) 1 x 24-pin EATX Power connector(s) 1 x 8-pin ATX 12V Power connector(s) 1 x Front panel audio connector(s) (AAFP) 1 x System panel(s) (Q-Connector) 1 x DirectKey Button(s) 1 x DRCT header(s) 1 x MemOK! button(s) 1 x Clear CMOS jumper(s) 1 x USB BIOS Flashback button(s)
Panel Trasero I/O	1 x PS/2 keyboard (purple) 1 x PS/2 mouse (green) 1 x eSATA 1 x LAN (RJ45) port(s) 2 x USB 3.0 8 x USB 2.0 (one port can be switched to USB BIOS Flashback) 1 x Optical S/PDIF out 6 x Audio jack(s)
Caracter�sticas Especiales	Dual Intelligent Processors 3 with New DIGI+ Power Control - Full Hardware Control. Total Performance Tuning. Remote GO! - One-stop PC Remote Control and Home Entertainment USB 3.0 Boost - Faster USB 3.0 Transmission with UASP Network iControl - Real-time Network Bandwidth Control DirectKey - A Dedicated Button to Access the BIOS Directly USB BIOS Flashback - Easy, Worry-free USB BIOS Flashback with Hardware-based Design UEFI BIOS - Flexible & Easy BIOS Interface
S.O.	Compatible con Microsoft � de Windows � 8/8 64-bit 7/7 de 64-bit / Vista � / Vista � 64-bit
Factor de Forma	ATX: 12 inch x 9.6 inch ( 30.5 cm x 24.4 cm )', '17');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10007', '4', 'si', '17');



INSERT INTO producto (`id_producto`, `nombre`, `precio`, `categoria`, `foto`) VALUES ('18', 'Tarjeta de Video MSI R9 390 Gaming 8GB DDR5', '$1,259,000', '3', 'images/18.jpg');
INSERT INTO detalle (`id_detalle`, `fabricante`, `caracteristica`, `id_producto`) VALUES ('1008', 'MSI', 'Velocidad de Reloj GPU	1060 MHz (Modo OC) 1040 MHz (Modo Gaming) 1000 MHz (Modo Silencioso)
Procesadores de Flujo	2560 x Procesadores de flujo Graphics Core Next (GCN)
Interface de Salida	DL-DVI-I/DL-DVI-D/HDMI DisplayPort x3 1 (version 1.4a) Resolucion maxima: 4096x2160 @24 Hz (1.4a) 1 (versi�n 1.2) Resoluci�n m�xima: 4096x2160 @60 Hz
Tama�o del Chip	28 nm Chip
Tama�o de Memoria (MB)	8192 MB
Interface de Memoria	512 -bit DDR5
Velocidad Efectiva Memoria	6100 (Modo OC) / 6000
Soporte Open GL	4.4
Soporte Direct X	Direct X 12
Soporte Crossfire / SLI	S�
Fuente de Poder Requerida	750w reales (seg�n configuraci�n del PC y demos componentes)
Dimensiones	277 (L) X129 (W) X51 (H) mm 2X slot
Caracter�sticas Especiales	Twin frozr V, Ventilador TORX, Super SU p�pe, Gaming App, MSI Afterburner, Preadator, XSplit gamercaster, Componentes military class' , '18');
INSERT INTO stock (`id_stock`, `cantidad`, `disponibilidad`, `id_producto`) VALUES ('10008', '4', 'si', '18');