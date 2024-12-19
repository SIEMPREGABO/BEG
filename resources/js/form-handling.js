const municipiosPorEstado = {
    "Aguascalientes": ["Aguascalientes", "Asientos", "Calvillo", "Cosío", "El Llano", "Jesús María", "Pabellón de Arteaga", "Rincón de Romos", "San José de Gracia", "San Francisco de los Romo", "Tepezalá"],
    "Baja California": ["Ensenada", "Mexicali", "Playas de Rosarito", "Tecate", "Tijuana"],
    "Baja California Sur": ["Comondú", "La Paz", "Loreto", "Los Cabos", "Mulegé"],
    "Campeche": ["Calakmul", "Calkiní", "Campeche", "Candelaria", "Carmen", "Champotón", "Escárcega", "Hecelchakán", "Hopelchén", "Palizada", "Tenabo"],
    "Chiapas": ["Acacoyagua", "Acala", "Acapetahua", "Aldama", "Altamirano", "Amatán", "Amatenango de la Frontera", "Amatenango del Valle", "Angel Albino Corzo", "Arriaga", "Bejucal de Ocampo", "Bella Vista", "Benemérito de las Américas", "Berriozábal", "Bochil", "Cacahoatán", "Catazajá", "Chalchihuitán", "Chamula", "Chanal", "Chapultenango", "Chenalhó", "Chiapa de Corzo", "Chiapilla", "Chicoasén", "Chicomuselo", "Chilón", "Cintalapa", "Coapilla", "Comitán de Domínguez", "Copainalá", "El Bosque", "El Porvenir", "Escuintla", "Francisco León", "Frontera Comalapa", "Frontera Hidalgo", "Huehuetán", "Huitiupán", "Huixtán", "Huixtla", "Ixhuatán", "Ixtacomitán", "Ixtapa", "Ixtapangajoya", "Jiquipilas", "Jitotol", "Juárez", "La Concordia", "La Grandeza", "La Independencia", "La Libertad", "La Trinitaria", "Larráinzar", "Las Margaritas", "Las Rosas", "Mapastepec", "Maravilla Tenejapa", "Marqués de Comillas", "Mazapa de Madero", "Mazatán", "Metapa", "Mitontic", "Montecristo de Guerrero", "Motozintla", "Nicolás Ruíz", "Ocosingo", "Ocotepec", "Ocozocoautla de Espinosa", "Ostuacán", "Osumacinta", "Oxchuc", "Palenque", "Pantelhó", "Pantepec", "Pichucalco", "Pijijiapan", "Pueblo Nuevo Solistahuacán", "Rayón", "Reforma", "Sabanilla", "Salto de Agua", "San Andrés Duraznal", "San Cristóbal de las Casas", "San Fernando", "San Juan Cancuc", "San Lucas", "Santiago el Pinar", "Siltepec", "Simojovel", "Sitalá", "Socoltenango", "Solosuchiapa", "Soyaló", "Suchiapa", "Suchiate", "Sunuapa", "Tapachula", "Tapalapa", "Tapilula", "Tecpatán", "Tenejapa", "Teopisca", "Tila", "Tonalá", "Totolapa", "Tumbalá", "Tuxtla Chico", "Tuxtla Gutiérrez", "Tuzantán", "Tzimol", "Unión Juárez", "Venustiano Carranza", "Villa Comaltitlán", "Villa Corzo", "Villaflores", "Yajalón", "Zinacantán"],
    "Chihuahua": ["Ahumada", "Aldama", "Allende", "Aquiles Serdán", "Ascensión", "Bachíniva", "Balleza", "Batopilas", "Bocoyna", "Buenaventura", "Camargo", "Carichí", "Casas Grandes", "Chihuahua", "Chínipas", "Coronado", "Coyame del Sotol", "Cuauhtémoc", "Cusihuiriachi", "Delicias", "Dr. Belisario Domínguez", "El Tule", "Galeana", "Gómez Farías", "Gran Morelos", "Guachochi", "Guadalupe", "Guadalupe y Calvo", "Guazapares", "Guerrero", "Hidalgo del Parral", "Huejotitán", "Ignacio Zaragoza", "Janos", "Jiménez", "Juárez", "Julimes", "La Cruz", "López", "Madera", "Maguarichi", "Manuel Benavides", "Matachí", "Matamoros", "Meoqui", "Morelos", "Moris", "Namiquipa", "Nonoava", "Nuevo Casas Grandes", "Ocampo", "Ojinaga", "Praxedis G. Guerrero", "Riva Palacio", "Rosales", "Rosario", "San Francisco de Borja", "San Francisco de Conchos", "San Francisco del Oro", "Santa Bárbara", "Santa Isabel", "Satevó", "Saucillo", "Temósachic", "Urique", "Uruachi", "Valle de Zaragoza"],
    "Ciudad de México": ["Álvaro Obregón", "Azcapotzalco", "Benito Juárez", "Coyoacán", "Cuajimalpa de Morelos", "Cuauhtémoc", "Gustavo A. Madero", "Iztacalco", "Iztapalapa", "La Magdalena Contreras", "Miguel Hidalgo", "Milpa Alta", "Tláhuac", "Tlalpan", "Venustiano Carranza", "Xochimilco"],
    "Coahuila": ["Acuña", "Allende", "Arteaga", "Candela", "Castaños", "Cuatro Ciénegas", "Escobedo", "Francisco I. Madero", "Frontera", "General Cepeda", "Guerrero", "Hidalgo", "Jiménez", "Juárez", "Lamadrid", "Matamoros", "Monclova", "Morelos", "Múzquiz", "Nadadores", "Nava", "Ocampo", "Parras", "Piedras Negras", "Progreso", "Ramos Arizpe", "Sabinas", "Sacramento", "Saltillo", "San Buenaventura", "San Juan de Sabinas", "San Pedro", "Sierra Mojada", "Torreón", "Viesca", "Villa Unión", "Zaragoza"],
    "Colima": ["Armería", "Colima", "Comala", "Coquimatlán", "Cuauhtémoc", "Ixtlahuacán", "Manzanillo", "Minatitlán", "Tecomán", "Villa de Álvarez"],
    "Durango": ["Canatlán", "Canelas", "Coneto de Comonfort", "Cuencamé", "Durango", "El Oro", "General Simón Bolívar", "Gómez Palacio", "Guadalupe Victoria", "Guanaceví", "Hidalgo", "Indé", "Lerdo", "Mapimí", "Mezquital", "Nazas", "Nombre de Dios", "Nuevo Ideal", "Ocampo", "Otáez", "Pánuco de Coronado", "Peñón Blanco", "Poanas", "Pueblo Nuevo", "Rodeo", "San Bernardo", "San Dimas", "San Juan de Guadalupe", "San Juan del Río", "San Luis del Cordero", "San Pedro del Gallo", "Santa Clara", "Santiago Papasquiaro", "Súchil", "Tamazula", "Tepehuanes", "Tlahualilo", "Topia", "Vicente Guerrero"],
    "Guanajuato": ["Abasolo", "Acámbaro", "Apaseo el Alto", "Apaseo el Grande", "Atarjea", "Celaya", "Comonfort", "Coroneo", "Cortazar", "Cuerámaro", "Doctor Mora", "Dolores Hidalgo", "Guanajuato", "Huanímaro", "Irapuato", "Jaral del Progreso", "Jerécuaro", "León", "Manuel Doblado", "Moroleón", "Ocampo", "Pénjamo", "Pueblo Nuevo", "Purísima del Rincón", "Romita", "Salamanca", "Salvatierra", "San Diego de la Unión", "San Felipe", "San Francisco del Rincón", "San José Iturbide", "San Luis de la Paz", "San Miguel de Allende", "Santa Catarina", "Santa Cruz de Juventino Rosas", "Santiago Maravatío", "Silao de la Victoria", "Tarandacuao", "Tarimoro", "Tierra Blanca", "Uriangato", "Valle de Santiago", "Victoria", "Villagrán", "Xichú", "Yuriria"],
    "Guerrero": ["Acapulco de Juárez", "Acatepec", "Ahuacuotzingo", "Ajuchitlán del Progreso", "Alcozauca de Guerrero", "Alpoyeca", "Apaxtla", "Arcelia", "Atenango del Río", "Atlamajalcingo del Monte", "Atlixtac", "Atoyac de Álvarez", "Ayutla de los Libres", "Azoyú", "Benito Juárez", "Buenavista de Cuéllar", "Chilapa de Álvarez", "Chilpancingo de los Bravo", "Coahuayutla de José María Izazaga", "Cochoapa el Grande", "Cocula", "Copala", "Copalillo", "Copanatoyac", "Coyuca de Benítez", "Coyuca de Catalán", "Cuajinicuilapa", "Cualác", "Cuautepec", "Cuetzala del Progreso", "Cutzamala de Pinzón", "Eduardo Neri", "Florencio Villarreal", "General Canuto A. Neri", "General Heliodoro Castillo", "Huamuxtitlán", "Huitzuco de los Figueroa", "Iguala de la Independencia", "Igualapa", "Iliatenco", "Ixcateopan de Cuauhtémoc", "José Joaquín de Herrera", "Juan R. Escudero", "Juchitán", "La Unión de Isidoro Montes de Oca", "Leonardo Bravo", "Malinaltepec", "Marquelia", "Mártir de Cuilapan", "Metlatónoc", "Mochitlán", "Olinalá", "Ometepec", "Pedro Ascencio Alquisiras", "Petatlán", "Pilcaya", "Pungarabato", "Quechultenango", "San Luis Acatlán", "San Marcos", "San Miguel Totolapan", "Taxco de Alarcón", "Tecoanapa", "Técpan de Galeana", "Teloloapan", "Tepecoacuilco de Trujano", "Tetipac", "Tixtla de Guerrero", "Tlacoachistlahuaca", "Tlacoapa", "Tlalchapa", "Tlalixtaquilla de Maldonado", "Tlapa de Comonfort", "Tlapehuala", "Xalpatláhuac", "Xochihuehuetlán", "Xochistlahuaca", "Zapotitlán Tablas", "Zihuatanejo de Azueta", "Zirándaro", "Zitlala"],
    "Hidalgo": ["Acatlán", "Acaxochitlán", "Actopan", "Agua Blanca de Iturbide", "Ajacuba", "Alfajayucan", "Almoloya", "Apan", "Atitalaquia", "Atlapexco", "Atotonilco de Tula", "Atotonilco el Grande", "Calnali", "Cardonal", "Chapantongo", "Chapulhuacán", "Chilcuautla", "Cuautepec de Hinojosa", "El Arenal", "Eloxochitlán", "Emiliano Zapata", "Epazoyucan", "Francisco I. Madero", "Huasca de Ocampo", "Huautla", "Huazalingo", "Huehuetla", "Huejutla de Reyes", "Huichapan", "Ixmiquilpan", "Jacala de Ledezma", "Jaltocán", "Juárez Hidalgo", "La Misión", "Lolotla", "Metepec", "Metztitlán", "Mineral de la Reforma", "Mineral del Chico", "Mineral del Monte", "Mixquiahuala de Juárez", "Molango de Escamilla", "Nicolás Flores", "Nopala de Villagrán", "Omitlán de Juárez", "Pachuca de Soto", "Pacula", "Pisaflores", "Progreso de Obregón", "San Agustín Metzquititlán", "San Agustín Tlaxiaca", "San Bartolo Tutotepec", "San Felipe Orizatlán", "San Salvador", "Santiago de Anaya", "Santiago Tulantepec de Lugo Guerrero", "Singuilucan", "Tasquillo", "Tecozautla", "Tenango de Doria", "Tepeapulco", "Tepehuacán de Guerrero", "Tepeji del Río de Ocampo", "Tepetitlán", "Tetepango", "Tezontepec de Aldama", "Tianguistengo", "Tizayuca", "Tlahuelilpan", "Tlahuiltepa", "Tlanalapa", "Tlanchinol", "Tlaxcoapan", "Tolcayuca", "Tula de Allende", "Tulancingo de Bravo", "Villa de Tezontepec", "Xochiatipan", "Xochicoatlán", "Yahualica", "Zacualtipán de Ángeles", "Zapotlán de Juárez", "Zempoala", "Zimapán"],
    "Jalisco": ["Acatic", "Acatlán de Juárez", "Ahualulco de Mercado", "Amacueca", "Amatitán", "Ameca", "Arandas", "Atemajac de Brizuela", "Atengo", "Atenguillo", "Atotonilco el Alto", "Atoyac", "Autlán de Navarro", "Ayotlán", "Ayutla", "Bolaños", "Cabo Corrientes", "Casimiro Castillo", "Chapala", "Chimaltitán", "Chiquilistlán", "Cihuatlán", "Cocula", "Colotlán", "Concepción de Buenos Aires", "Cuautitlán de García Barragán", "Cuautla", "Cuquío", "Degollado", "Ejutla", "El Arenal", "El Grullo", "El Limón", "El Salto", "Encarnación de Díaz", "Etzatlán", "Gómez Farías", "Guachinango", "Guadalajara", "Hostotipaquillo", "Huejúcar", "Huejuquilla el Alto", "Ixtlahuacán de los Membrillos", "Ixtlahuacán del Río", "Jalostotitlán", "Jamay", "Jesús María", "Jilotlán de los Dolores", "Jocotepec", "Juanacatlán", "Juchitlán", "La Barca", "La Huerta", "La Manzanilla de la Paz", "Lagos de Moreno", "Magdalena", "Mascota", "Mazamitla", "Mexticacán", "Mezquitic", "Mixtlán", "Ocotlán", "Ojuelos de Jalisco", "Pihuamo", "Poncitlán", "Puerto Vallarta", "Quitupan", "San Cristóbal de la Barranca", "San Diego de Alejandría", "San Gabriel", "San Juan de los Lagos", "San Juanito de Escobedo", "San Julián", "San Marcos", "San Martín de Bolaños", "San Martín Hidalgo", "San Miguel el Alto", "San Pedro Tlaquepaque", "San Sebastián del Oeste", "Santa María de los Ángeles", "Santa María del Oro", "Sayula", "Tala", "Talpa de Allende", "Tamazula de Gordiano", "Tapalpa", "Tecalitlán", "Techaluta de Montenegro", "Tecolotlán", "Tenamaxtlán", "Teocaltiche", "Teocuitatlán de Corona", "Tepatitlán de Morelos", "Tequila", "Teuchitlán", "Tizapán el Alto", "Tlajomulco de Zúñiga", "Tolimán", "Tomatlán", "Tonalá", "Tonaya", "Tonila", "Totatiche", "Tototlán", "Tuxcacuesco", "Tuxcueca", "Tuxpan", "Unión de San Antonio", "Unión de Tula", "Valle de Guadalupe", "Valle de Juárez", "Villa Purificación", "Zapotlán el Grande"],
    "Estado de México": ["Acambay", "Acolman", "Aculco", "Almoloya de Alquisiras", "Almoloya de Juarez", "Almoloya del Rio", "Amanalco", "Amatepec", "Amecameca", "Apaxco", "Atenco", "Atizapan", "Atizapan de Zaragoza", "Atlacomulco", "Atlautla", "Axapusco", "Ayapango", "Calimaya", "Capulhuac", "Chalco", "Chapa de Mota", "Chapultepec", "Chiautla", "Chicoloapan", "Chiconcuac", "Chimalhuacan", "Coacalco de Berriozabal", "Coatepec Harinas", "Cocotitlan", "Coyotepec", "Cuautitlan", "Cuautitlan Izcalli", "Donato Guerra", "Ecatepec de Morelos", "Ecatzingo", "El Oro", "Huehuetoca", "Hueypoxtla", "Huixquilucan", "Isidro Fabela", "Ixtapaluca", "Ixtapan de la Sal", "Ixtapan del Oro", "Ixtlahuaca", "Jaltenco", "Jilotepec", "Jilotzingo", "Jiquipilco", "Jocotitlan", "Joquicingo", "Juchitepec", "La Paz", "Lerma", "Luvianos", "Malinalco", "Melchor Ocampo", "Metepec", "Mexicaltzingo", "Morelos", "Naucalpan de Juarez", "Nextlalpan", "Nezahualcoyotl", "Nicolas Romero", "Nopaltepec", "Ocoyoacac", "Ocuilan", "Otumba", "Otzoloapan", "Otzolotepec", "Ozumba", "Papalotla", "Polotitlan", "Rayon", "San Antonio la Isla", "San Felipe del Progreso", "San Jose del Rincon", "San Martin de las Piramides", "San Mateo Atenco", "San Simon de Guerrero", "Santo Tomas", "Soyaniquilpan de Juarez", "Sultepec", "Tecamac", "Tejupilco", "Temamatla", "Temascalapa", "Temascalcingo", "Temascaltepec", "Temoaya", "Tenancingo", "Tenango del Aire", "Tenango del Valle", "Teoloyucan", "Teotihuacan", "Tepetlaoxtoc", "TepetlixpaTepotzotlan", "Tequixquiac", "Texcaltitlan", "Texcalyacac", "Texcoco", "Tezoyuca", "Tianguistenco", "Timilpan", "Tlalmanalco", "Tlalnepantla de Baz", "Tlatlaya", "Toluca", "Tonanitla", "Tonatico", "Tultepec", "Tultitlan", "Valle de Bravo", "Valle de Chalco Solidaridad", "Villa de Allende", "Villa del Carbon", "Villa Guerrero", "Villa Victoria", "Xalatlaco", "Xonacatlan", "Zacazonapan", "Zacualpan", "Zinacantepec", "Zumpahuacan", "Zumpango"],
    "Michoacán": ["Acuitzio", "Aguililla", "alvaro Obregon", "Angamacutiro", "Angangueo", "Apatzingan", "Aporo", "Aquila", "Ario de Rosales", "Arteaga", "BriseÃ±as", "Buenavista", "Caracuaro", "Charapan", "Charo", "Chavinda", "Cheran", "Chilchota", "Chuinicuila", "Chucandiro", "Churintzio", "Churumuco", "Coahuayana", "Coalcoman de Vazquez Pallares", "Coeneo", "Cojumatlan de Regules", "Contepec", "Copandaro", "Cotija", "Cuitzeo", "Escuandureo", "Epitacio Huerta", "Erongaricuaro", "Gabriel Zamora", "Hidalgo", "Huandacareo", "Huaniqueo", "Huetamo", "Huiramba", "Indaparapeo", "Irimbo", "Ixtlan", "Jacona", "Jimenez", "Jiquilpan", "Jose Sixto Verduzco", "Juarez", "Jungapeo", "La Huacana", "La Piedad", "Lagunillas", "Lazaro Cardenas", "Los Reyes", "Madero", "Maravatio", "MarcosÂ Castellanos", "Morelia", "Morelos", "Mugica", "Nahuatzen", "Nocupetaro", "NuevoÂ Parangaricutiro", "Nuevo Urecho", "Numaran", "Ocampo", "Pajacuaran", "Panindicuaro", "Paracho", "Paracuaro", "Patzcuaro", "Penjamillo", "Periban", "Purepero", "Puruandiro", "Querendaro", "Quiroga", "Sahuayo", "Salvador Escalante", "San Lucas", "Santa Ana Maya", "Senguio", "Susupuato", "Tancitaro", "Tangamandapio", "Tangancicuaro", "Tanhuato", "Taretan", "Tarimbaro", "Tepalcatepec", "TingÃ¼indin", "Tingambato", "Tiquicheo de Nicolas Romero", "Tlalpujahua", "Tlazazalca", "Tocumbo", "Tumbiscatio", "Turicato", "Tuxpan", "Tuzantla", "Tzintzuntzan", "Tzitzio", "Uruapan", "Venustiano Carranza", "Villamar", "Vista Hermosa", "Yurecuaro", "Zacapu", "Zamora", "Zinaparo", "Zinapecuaro", "Ziracuaretiro"],
    "Morelos": ["Amacuzac", "Atlatlahucan", "Axochiapan", "Ayala", "Coatlan del Rio", "Cuautla", "Cuernavaca", "Emiliano Zapata", "Huitzilac", "Jantetelco", "Jiutepec", "Jojutla", "Jonacatepec", "Mazatepec", "Miacatlan", "Ocuituco", "Puente de Ixtla", "Temixco", "Temoac", "Tepalcingo", "Tepoztlan", "Tetecala", "Tetela del Volcan", "Tlalnepantla", "Tlaltizapan de Zapata", "Tlaquiltenango", "Tlayacapan", "Totolapan", "Xochitepec", "Yautepec de Zaragoza", "Yecapixtla", "Zacatepec de Hidalgo", "Zacualpan de Amilpas"],
    "Nayarit": ["Acaponeta", "Ahuacatlan", "Amatlan de Cañas", "Bahia de Banderas", "Compostela", "El Nayar", "Huajicori", "Ixtlan del Rio", "Jala", "La Yesca", "Rosamorada", "Ruiz", "San Blas", "San Pedro Lagunillas", "Santa Maria del Oro", "Santiago Ixcuintla", "Tecuala", "Tepic", "Tuxpan", "Xalisco"],
    "Nuevo León": ["Abasolo", "Agualeguas", "Allende", "Anahuac", "Apodaca", "Aramberri", "Bustamante", "Cadereyta Jimenez", "Cerralvo", "China", "Cienega de Flores", "Doctor Arroyo", "Doctor Coss", "Doctor Gonzalez", "El Carmen", "Galeana", "Garcia", "General Bravo", "General Escobedo", "General Teran", "General TreviÃ±o", "General Zaragoza", "General Zuazua", "Guadalupe", "Hidalgo", "Higueras", "Hualahuises", "Iturbide", "Juarez", "Lampazos de Naranjo", "Linares", "Los Aldamas", "Los Herreras", "Los Ramones", "Marin", "Melchor Ocampo", "Mier y Noriega", "Mina", "Montemorelos", "Monterrey", "Paras", "Pesqueria", "Rayones", "Sabinas Hidalgo", "Salinas Victoria", "San Nicolas de los Garza", "San Pedro Garza Garcia", "Santa Catarina", "Santiago", "Vallecillo", "Villaldama"],
    "Oaxaca": ["Abejones", "Acatlan de Perez Figueroa", "animas Trujano", "Asuncion Cacalotepec", "Asuncion Cuyotepeji", "Asuncion Ixtaltepec", "Asuncion Nochixtlan", "Asuncion Ocotlan", "Asuncion Tlacolulita", "Ayoquezco de Aldama", "Ayotzintepec", "Calihuala", "Candelaria Loxicha", "Capulalpam de Mendez", "Chahuites", "Chalcatongo de Hidalgo", "Chiquihuitlan de Benito Juarez", "Cienega de Zimatlan", "Ciudad Ixtepec", "Coatecas Altas", "Coicoyan de las Flores", "Concepcion Buenavista", "Concepcion Papalo", "Constancia del Rosario", "Cosolapa", "Cosoltepec", "Cuilapam de Guerrero", "Cuyamecalco Villa de Zaragoza", "El Barrio de la Soledad", "El Espinal", "Eloxochitlan de Flores Magon", "Fresnillo de Trujano", "Guadalupe de Ramirez", "Guadalupe Etla", "Guelatao de Juarez", "Guevea de Humboldt", "Heroica Ciudad de Ejutla de Crespo", "Heroica Ciudad de Huajuapan de Leon", "Heroica Ciudad de Tlaxiaco", "Huautepec", "Huautla de Jimenez", "Ixpantepec Nieves", "Ixtlan de Juarez", "Juchitan de Zaragoza", "La Compañia", "La Pe", "La Reforma", "La Trinidad Vista Hermosa", "Loma Bonita", "Magdalena Apasco", "Magdalena Jaltepec", "Magdalena Mixtepec", "Magdalena Ocotlan", "Magdalena PeÃ±asco", "Magdalena Teitipac", "Magdalena Tequisistlan", "Magdalena Tlacotepec", "Magdalena Yodocono de Porfirio Diaz", "Magdalena Zahuatlan", "Mariscala de Juarez", "Martires de Tacubaya", "Matias Romero Avendaño", "Mazatlan Villa de Flores", "Mesones Hidalgo", "Miahuatlan de Porfirio Diaz", "Mixistlan de la Reforma", "Monjas", "Natividad", "Nazareno Etla", "Nejapa de Madero", "Nuevo Zoquiapam", "Oaxaca de Juarez", "Ocotlan de Morelos", "Pinotepa de Don Luis", "Pluma Hidalgo", "Putla Villa de Guerrero", "Reforma de Pineda", "Reyes Etla", "Rojas de Cuauhtemoc", "Salina Cruz", "San Agustin Amatengo", "San Agustin Atenango", "San Agustin Chayuco", "San Agustin de las Juntas", "San Agustin Etla", "San Agustin Loxicha", "San Agustin Tlacotepec", "San Agustin Yatareni", "San Andres Cabecera Nueva", "San Andres Dinicuiti", "San Andres Huaxpaltepec", "San Andres Huayapam", "San Andres Ixtlahuaca", "San Andres Lagunas", "San Andres NuxiÃ±o", "San Andres Paxtlan", "San Andres Sinaxtla", "San Andres Solaga", "San Andres Teotilalpam", "San Andres Tepetlapa", "San Andres Yaa", "San Andres Zabache", "San Andres Zautla", "San Antonino Castillo Velasco", "San Antonino el Alto",
        "San Antonino Monteverde", "San Antonio Acutla", "San Antonio de la Cal", "San Antonio Huitepec", "San Antonio Nanahuatipam", "San Antonio Sinicahua", "San Antonio Tepetlapa", "San Baltazar Chichicapam", "San Baltazar Loxicha", "San Baltazar Yatzachi el Bajo", "San Bartolo Coyotepec", "San Bartolo Soyaltepec", "San Bartolo Yautepec", "San Bartolome Ayautla", "â€œSan Bartolome Loxicha", "San Bartolome Quialana", "San Bartolome YucuaÃ±e", "San Bartolome Zoogocho", "San Bernardo Mixtepec", "San Blas Atempa", "San Carlos Yautepec", "San Cristobal Amatlan", "San Cristobal Amoltepec", "San Cristobal Lachirioag", "San Cristobal Suchixtlahuaca", "San Dionisio del Mar", "San Dionisio Ocotepec", "San Dionisio Ocotlan", "San Esteban Atatlahuca", "San Felipe Jalapa de Diaz", "San Felipe Tejalapam", "San Felipe Usila", "San Francisco Cahuacua", "San Francisco Cajonos", "San Francisco Chapulapa", "San Francisco Chindua", "San Francisco del Mar", "San Francisco Huehuetlan", "San Francisco Ixhuatan", "San Francisco Jaltepetongo", "San Francisco Lachigolo", "San Francisco Logueche", "San Francisco Nuxaño", "San Francisco Ozolotepec", "San Francisco Sola", "San Francisco Telixtlahuaca", "San Francisco Teopan", "San Francisco Tlapancingo", "San Gabriel Mixtepec", "San Ildefonso Amatlan", "San Ildefonso Sola", "San Ildefonso Villa Alta", "San Jacinto Amilpas", "San Jacinto Tlacotepec", "San Jeronimo Coatlan", "San Jeronimo Silacayoapilla", "San Jeronimo Sosola", "San Jeronimo Taviche", "San Jeronimo Tecoatl", "San Jeronimo Tlacochahuaya", "San Jorge Nuchita", "San Jose Ayuquila", "San Jose Chiltepec", "San Jose del Peñasco", "San Jose del Progreso", "San Jose Estancia Grande", "San Jose Independencia", "San Jose Lachiguiri", "San Jose Tenango", "San Juan Achiutla", "San Juan Atepec", "San Juan Bautista Atatlahuca", "San Juan Bautista Coixtlahuaca", "San Juan Bautista Cuicatlan", "San Juan Bautista Guelache", "San Juan Bautista Jayacatlan", "San Juan Bautista Lo de Soto", "San Juan Bautista Suchitepec", "San Juan Bautista Tlacoatzintepec", "San Juan Bautista Tlachichilco", "San Juan Bautista Tuxtepec", "San Juan Bautista Valle Nacional", "San Juan Cacahuatepecv", "San Juan Chicomezuchil", "San Juan Chilateca", "San Juan Cieneguilla", "San Juan Coatzospam", "San Juan Colorado", "San Juan Comaltepec", "San Juan Cotzocon", "San Juan del Estado", "San Juan de los Cues",
        "San Juan del Rio", "San Juan Diuxi", "San Juan Evangelista Analco", "San Juan Guelavia", "San Juan Guichicovi", "San Juan Ihualtepec", "San Juan Juquila Mixes", "San Juan Juquila Vijanos", "San Juan Lachao", "San Juan Lachigalla", "San Juan Lajarcia", "San Juan Lalana", "San Juan Mazatlan", "San Juan Mixtepec, distrito 08", "San Juan Mixtepec, distrito 26", "San Juan Ã'umi", "San Juan Ozolotepec", "San Juan Petlapa", "San Juan Quiahije", "San Juan Quiotepec", "San Juan Sayultepec", "San Juan Tabaa", "San Juan Tamazola", "San Juan Teita", "San Juan Teitipac", "San Juan Tepeuxila", "San Juan Teposcolula", "San Juan Yaee", "San Juan Yatzona", "San Juan Yucuita", "San Lorenzo", "San Lorenzo Albarradas", "San Lorenzo Cacaotepec", "San Lorenzo Cuaunecuiltitla", "San Lorenzo Texmelucan", "San Lorenzo Victoria", "San Lucas Camotlan", "San Lucas Ojitlan", "San Lucas Quiavini", "San Lucas Zoquiapam", "San Luis Amatlan", "San Marcial Ozolotepec", "San Marcos Arteaga", "San Martin de los Cansecos", "San Martin Huamelulpam", "San Martin Itunyoso", "San Martin Lachila", "San Martin Peras", "San Martin Tilcajete", "San Martin Toxpalan", "San Martin Zacatepec", "San Mateo Cajonos", "San Mateo del Mar", "San Mateo Etlatongo", "San Mateo Nejapam", "San Mateo Peñasco", "San Mateo PiÃ±as", "San Mateo Rio Hondo", "San Mateo Sindihui", "San Mateo Tlapiltepec", "San Mateo Yoloxochitlan", "San Melchor Betaza", "San Miguel Achiutla", "San Miguel Ahuehuetitlan", "San Miguel Aloapam", "San Miguel Amatitlan", "San Miguel Amatlan", "San Miguel Coatlan", "San Miguel Chicahua", "San Miguel Chimalapa", "San Miguel del Puerto", "San Miguel del Rio", "San Miguel Ejutla", "San Miguel el Grande", "San Miguel Huautla", "San Miguel Mixtepec", "San Miguel Panixtlahuaca", "San Miguel Peras", "San Miguel Piedras", "San Miguel Quetzaltepec", "San Miguel Santa Flor", "San Miguel Soyaltepec", "San Miguel Suchixtepec", "San Miguel Tecomatlan", "San Miguel Tenango", "San Miguel Tequixtepec", "San Miguel Tilquiapam", "San Miguel Tlacamama", "San Miguel Tlacotepec", "San Miguel Tulancingo", "San Miguel Yotao", "San Nicolas", "San Nicolas Hidalgo", "San Pablo Coatlan", "San Pablo Cuatro Venados", "San Pablo Etla", "San Pablo Huitzo", "San Pablo Huixtepec", "San Pablo Macuiltianguis", "San Pablo Tijaltepec", "San Pablo Villa de Mitla", "San Pablo Yaganiza", "San Pedro Amuzgos", "San Pedro Apostol",
        "San Pedro Atoyac", "San Pedro Cajonos", "San Pedro Comitancillo", "San Pedro Cocaltepec Cantaros", "San Pedro el Alto", "San Pedro Huamelula", "San Pedro Huilotepec", "San Pedro Ixcatlan", "San Pedro Ixtlahuaca", "San Pedro Jaltepetongo", "San Pedro Jicayan", "San Pedro Jocotipac", "San Pedro Juchatengo", "San Pedro Martir", "San Pedro Martir Quiechapa", "San Pedro Martir Yucuxaco", "San Pedro Mixtepec, distrito 22", "San Pedro Mixtepec, distrito 26", "San Pedro Molinos", "San Pedro Nopala", "San Pedro Ocopetatillo", "San Pedro Ocotepec", "San Pedro Pochutla", "San Pedro Quiatoni", "San Pedro Sochiapam", "San Pedro Tapanatepec", "San Pedro Taviche", "San Pedro Teozacoalco", "San Pedro Teutila", "San Pedro Tidaa", "San Pedro Topiltepec", "San Pedro Totolapam", "San Pedro y San Pablo Ayutla", "San Pedro y San Pablo Teposcolula", "San Pedro y San Pablo Tequixtepec", "San Pedro Yaneri", "San Pedro Yolox", "San Pedro Yucunama", "San Raymundo Jalpan", "San Sebastian Abasolo", "San Sebastian Coatlan", "San Sebastian Ixcapa", "San Sebastian Nicananduta", "San Sebastian Rio Hondo", "San Sebastian Tecomaxtlahuaca", "San Sebastian Teitipac", "San Sebastian Tutla", "San Simon Almolongas", "San Simon ZahuatlanÂ Â ", "Santa Ana", "Santa Ana Ateixtlahuaca", "Santa Ana Cuauhtemoc", "Santa Ana del Valle", "Santa Ana Tavela", "Santa Ana Tlapacoyan", "Santa Ana Yareni", "Santa Ana Zegache", "Santa Catalina Quieri", "Santa Catarina Cuixtla", "Santa Catarina Ixtepeji", "Santa Catarina Juquila", "Santa Catarina Lachatao", "Santa Catarina Loxicha", "Santa Catarina Mechoacan", "Santa Catarina Minas", "Santa Catarina Quiane", "Santa Catarina Quioquitani", "Santa CatarinaTayata", "Santa Catarina Ticua", "Santa Catarina Yosonotu", "Santa Catarina Zapoquila", "Santa Cruz Acatepec", "Santa Cruz Amilpas", "Santa Cruz de Bravo", "Santa Cruz Itundujia", "Santa Cruz Mixtepec", "Santa Cruz Nundaco", "Santa Cruz Papalutla", "Santa Cruz Tacache de Mina", "Santa Cruz Tacahua", "Santa Cruz Tayata", "Santa Cruz Xitla", "Santa Cruz Xoxocotlan", "Santa Cruz Zenzontepec", "Santa Gertrudis", "Santa Ines del Monte", "Santa Ines de Zaragoza", "Santa Ines Yatzeche", "Santa Lucia del Camino", "Santa Lucia Miahuatlan", "Santa Lucia Monteverde", "Santa Lucia Ocotlan", "Santa Magdalena Jicotlan", "Santa Maria Alotepec", "Santa Maria Apazco", "Santa Maria Atzompa", "Santa Maria Camotlan", "Santa Maria Chachoapam",
        "Santa Maria Chilchotla", "Santa Maria Chimalapa", "Santa Maria Colotepec", "Santa Maria Cortijo", "Santa Maria Coyotepec", "Santa Maria del Rosario", "Santa Maria del Tule", "Santa Maria Ecatepec", "Santa Maria Guelace", "Santa Maria Guienagati", "Santa Maria Huatulco", "Santa Maria Huazolotitlan", "Santa Maria Ipalapa", "Santa Maria Ixcatlan", "Santa Maria Jacatepec", "Santa Maria Jalapa del Marques", "Santa Maria Jaltianguis", "Santa Maria la Asuncion", "Santa Maria Lachixio", "Santa Maria Mixtequilla", "Santa Maria Nativitas", "Santa Maria Nduayaco", "Santa Maria Ozolotepec", "Santa Maria Papalo", "Santa Maria PeÃ±oles", "Santa Maria Petapa", "Santa Maria Quiegolani", "Santa Maria Sola", "Santa Maria Tataltepec", "Santa Maria Tecomavaca", "Santa Maria Temaxcalapa", "Santa Maria Temaxcaltepec", "Santa Maria Teopoxco", "Santa Maria Tepantlali", "Santa Maria Texcatitlan", "Santa Maria Tlahuitoltepec", "Santa Maria Tlalixtac", "Santa Maria Tonameca", "Santa Maria Totolapilla", "Santa Maria Xadani", "Santa Maria Yalina", "Santa Maria Yavesia", "Santa Maria Yolotepec", "Santa Maria Yosoyua", "Santa Maria Yucuhiti", "Santa Maria Zacatepec", "Santa Maria Zaniza", "Santa Maria Zoquitlan", "Santiago Amoltepec", "Santiago Apoala", "Santiago Apostol", "Santiago Astata", "Santiago Atitlan", "Santiago Ayuquililla", "Santiago Cacaloxtepec", "Santiago Camotlan", "Santiago Chazumba", "Santiago Choapam", "Santiago Comaltepec", "Santiago del Rio", "Santiago Huajolotitlan", "Santiago Huauclilla", "Santiago Ihuitlan Plumas", "Santiago Ixcuintepec", "Santiago Ixtayutla", "Santiago Jamiltepec", "Santiago Jocotepec", "Santiago Juxtlahuaca", "Santiago Lachiguiri", "Santiago Lalopa", "Santiago Laollaga", "Santiago Laxopa", "Santiago Llano Grande", "Santiago Matatlan", "Santiago Miltepec", "Santiago Minas", "Santiago Nacaltepec", "Santiago Nejapilla", "Santiago Niltepec", "Santiago Nundiche", "Santiago Nuyoo", "Santiago Pinotepa Nacional", "Santiago Suchilquitongo", "Santiago Tamazola", "Santiago Tapextla", "Santiago Tenango", "Santiago Tepetlapa", "Santiago Tetepec", "Santiago Texcalcingo", "Santiago Textitlan", "Santiago Tilantongo", "Santiago Tillo", "Santiago Tlazoyaltepec", "Santiago Xanica", "Santiago Xiacui", "Santiago Yaitepec", "Santiago Yaveo", "Santiago Yolomecatl", "Santiago Yosondua", "Santiago Yucuyachi", "Santiago Zacatepec", "Santiago Zoochila", "Santo Domingo Albarradas",
        "Santo Domingo Armenta", "Santo Domingo Chihuitan", "Santo Domingo de Morelos", "Santo Domingo Ingenio", "Santo Domingo Ixcatlan", "Santo Domingo Nuxaa", "Santo Domingo Ozolotepec", "Santo Domingo Petapa", "Santo Domingo Roayaga", "Santo Domingo Tehuantepec", "Santo Domingo Teojomulco", "Santo Domingo Tepuxtepec", "Santo Domingo Tlatayapam", "Santo Domingo Tomaltepec", "Santo Domingo Tonala", "Santo Domingo Tonaltepec", "Santo Domingo Xagacia", "Santo Domingo Yanhuitlan", "Santo Domingo Yodohino", "Santo Domingo Zanatepec", "Santo Tomas Jalieza", "Santo Tomas Mazaltepec", "Santo Tomas Ocotepec", "Santo Tomas Tamazulapan", "Santos Reyes Nopala", "Santos Reyes Papalo", "Santos Reyes Tepejillo", "Santos Reyes Yucuna", "San Vicente Coatlan", "San Vicente Lachixio", "San Vicente NuÃ±u", "Silacayoapam", "Sitio de Xitlapehua", "Soledad Etla", "Tamazulapam del Espiritu Santo", "Tanetze de Zaragoza", "Taniche", "Tataltepec de Valdes", "Teococuilco de Marcos Perez", "Teotitlan de Flores Magon", "Teotitlan del Valle", "Teotongo", "Tepelmeme Villa de Morelos", "Tezoatlan de Segura y Luna", "Tlacolula de Matamoros", "Tlacotepec Plumas", "Tlalixtac de Cabrera", "Totontepec Villa de Morelos", "Trinidad Zaachila", "Union Hidalgo", "Valerio Trujano", "Villa de Chilapa de Diaz", "Villa de Etla", "Villa de Tamazulapam del Progreso", "Villa de Tututepec de Melchor Ocampo", "Villa de Zaachila", "Villa Diaz Ordaz", "Villa Hidalgo", "Villa Sola de Vega", "Villa Talea de Castro", "Villa Tejupam de la Union", "Yaxe", "Yogana", "Yutanduchi de Guerrero", "Zapotitlan del Rio", "Zapotitlan Lagunas", "Zapotitlan Palmas", "Zimatlan de alvarez"],
    "Puebla": ["Acajete", "Acateno", "Acatlan", "Acatzingo", "Acteopan", "Ahuacatlan", "Ahuatlan", "Ahuazotepec", "Ahuehuetitla", "Ajalpan", "Albino Zertuche", "Aljojuca", "Altepexi", "Amixtlan", "Amozoc", "Aquixtla", "Atempan", "Atexcal", "Atlequizayan", "Atlixco", "Atoyatempan", "Atzala", "Atzitzihuacan", "Atzitzintla", "Axutla", "Ayotoxco de Guerrero", "Calpan", "Caltepec", "Camocuautla", "CaÃ±ada Morelos", "Caxhuacan", "Chalchicomula de Sesma", "Chapulco", "Chiautla", "Chiautzingo", "Chichiquila", "Chiconcuautla", "Chietla", "Chigmecatitlan", "Chignahuapan", "Chignautla", "Chila", "Chila de la Sal", "Chilchotla", "Chinantla", "Coatepec", "Coatzingo", "Cohetzala", "Cohuecan", "Coronango", "Coxcatlan", "Coyomeapan", "Coyotepec", "Cuapiaxtla de Madero", "Cuautempan", "Cuautinchan", "Cuautlancingo", "Cuayuca de Andradre", "Cuetzalan del Progreso", "Cuyoaco", "Domingo Arenas", "Eloxochitlan", "Epatlan", "Esperanza", "Francisco Z. Mena", "General Felipe angeles", "Guadalupe", "Guadalupe Victoria", "Hermenegildo Galeana", "Honey", "Huaquechula", "Huatlatlauca", "Huauchinango", "Huehuetla", "Huehuetlan el Chico", "Huehuetlan el Grande", "Huejotzingo", "Hueyapan", "Hueytamalco", "Hueytlalpan", "Huitzilan de Serdan", "Huitziltepec", "Ixcamilpa de Guerrero", "Ixcaquixtla", "Ixtacamaxtitlan", "Ixtepec", "Izucar de Matamoros", "Jalpan", "Jolalpan", "Jonotla", "Jopala", "Juan C. Bonilla", "Juan Galindo", "Juan N. Mendez", "Lafragua", "Libres", "Los Reyes de Juarez", "Magdalena Tlatlauquitepec", "Mazapiltepec de Juarez", "Mixtla", "Molcaxac", "Naupan", "Nauzontla", "Nealtican", "Nicolas Bravo", "Nopalucan", "Ocotepec", "Ocoyucan", "Olintla", "Oriental", "Pahuatlan", "Palmar de Bravo", "Pantepec", "Petlalcingo", "Piaxtla", "Puebla de Zaragoza", "Quecholac", "Quimixtlan", "Rafael Lara Grajales", "San Andres Cholula", "San Antonio Cañada", "San Diego La Meza Tochimiltzingo", "San Felipe Teotlalcingo", "San Felipe Tepatlan", "San Gabriel Chilac", "San Gregorio Atzompa", "San Jeronimo Tecuanipan", "San Jeronimo Xayacatlan", "San Jose Chiap", "San Jose Miahuatlan", "San Juan Atenco", "San Juan Atzompa", "San Martin Texmelucan", "San Martin Totoltepec", "San Matias Tlalancaleca", "San Miguel Ixtitlan", "San Miguel Xoxtla", "San Nicolas Buenos Aires", "San Nicolas de los Ranchos", "San Pablo Anicano", "San Pedro Cholula", "San Pedro Yeloixtlahuaca", "San Salvador el Seco", "San Salvador el Verde",
        "San Salvador Huixcolotla", "San Sebastian Tlacotepec", "Santa Catarina Tlaltempan", "San Ines Ahuatempan", "Santa Isabel Cholula", "Santiago Miahuatlan ", "Santo Tomas Hueyotlipan", "Soltepec", "Tecali de Herrera", "Tecamachalco", "Tecomatlan", "Tehuacan", "Tehuitzingo", "Tenampulco", "Teopantlan", "Teotlalco", "Tepanco de Lopez", "Tepango de Rodriguez", "Tepatlaxco de Hidalgo", "Tepeaca", "Tepemaxalco", "Tepeojuma", "Tepetzintla", "Tepexco", "Tepexi de Rodriguez", "Tepeyahualco", "Tepeyahualco de Cuauhtemoc", "Tetela de Ocampo", "Teteles de avila Castillo", "Teziutlan", "Tianguismanalco", "Tilapa", "Tlacotepec de Benito Juarez", "Tlacuilotepec", "Tlachichuca", "Tlahuapan", "Tlaltenango", "Tlanepantla", "Tlaola", "Tlapacoya", "Tlapanala", "Tlatlauquitepec", "Tlaxco", "Tochimilco", "Tochtepec", "Totoltepec de Guerrero", "Tulcingo", "Tuzamapan de Galeana", "Tzicatlacoyan", "Venustiano Carranza", "Vicente Guerrero", "Xayacatlan de Bravo", "Xicotepec", "Xicotlan", "Xiutetelco", "Xochiapulco", "Xochiltepec", "Xochitlan de Vicente Suarez", "Xochitlan Todos Santos", "Yaonahuac", "Yehualtepec", "Zacapala", "Zacapoaxtla", "Zacatlan", "Zapotitlan", "Zapotitlan de Mendez", "Zaragoza", "Zautla", "Zihuateutla", "Zinacatepec", "Zongozotla", "Zoquiapan", "Zoquitlan"],
    "Querétaro": ["Amealco de Bonfil", "Arroyo Seco", "Cadereyta de Montes", "Colon", "Corregidora", "El Marques", "Ezequiel Montes", "Huimilpan", "Jalpan de Serra", "Landa de Matamoros", "Pedro Escobedo", "PeÃ±amiller", "Pinal de Amoles", "Queretaro", "San Joaquin", "San Juan del Rio", "Tequisquiapan"],
    "Quintana Roo": ["Benito Juarez (Cancún)", "Cozumel", "Felipe Carrillo Puerto", "Isla Mujeres", "Jose Maria Morelos", "Lazaro Cardenas", "Othon P. Blanco", "Solidaridad", "Tulum"],
    "San Luis Potosí": ["Ahualulco", "Alaquines", "Aquismon", "Armadillo de los Infante", "Axtla de Terrazas", "Cardenas", "Catorce", "Cedral", "Cerritos", "Cerro de San Pedro", "Charcas", "Ciudad del Maiz", "Ciudad Fernandez", "Ciudad Valles", "Coxcatlan", "Ebano", "El Naranjo", "Guadalcazar", "Huehuetlan", "Lagunillas", "Matehuala", "Matlapa", "Mexquitic de Carmona", "Moctezuma", "Rayon", "Rioverde", "Salinas", "San Antonio", "San Ciro de Acosta", "San Luis Potosi", "San Martin Chalchicuautla", "San Nicolas Tolentino", "Santa Catarina", "Santa Maria del Rio", "Santo Domingo", "San Vicente Tancuayalab", "Soledad de Graciano Sanchez", "Tamasopo", "Tamazunchale", "Tampacan", "Tampamolon Corona", "Tamuin", "Tancanhuitz de Santos", "Tanlajas", "Tanquian de Escobedo", "Tierra Nueva", "Vanegas", "Venado", "Villa de Arriaga", "Villa de Arista", "Villa de Guadalupe", "Villa de la Paz", "Villa de Ramos", "Villa de Reyes", "Villa Hidalgo", "Villa Juarez", "Xilitla", "Zaragoza"],
    "Sinaloa": ["Ahome", "Angostura", "Badiraguato", "Choix", "Concordia", "Cosala", "Culiacan", "El Fuerte", "Elota", "El Rosario", "Escuinapa", "Guasave", "Mazatlan", "Mocorito", "Navolato", "Salvador Alvarado", "San Ignacio", "Sinaloa de Leyva"],
    "Sonora": ["Aconchi", "Agua Prieta", "Alamos", "Altar", "Arivechi", "Arizpe", "Atil", "Bacadehuachi", "Bacanora", "Bacerac", "Bacoachi", "Bacum", "Banamichi", "Baviacora", "Bavispe", "Benito Juarez", "Benjamin Hill", "Caborca", "Cajeme", "Cananea", "Carbo", "Cocurpe", "Cumpas", "Divisaderos", "Empalme", "Etchojoa", "Fronteras", "General Plutarco Elias Calles", "Granados", "Guaymas", "Hermosillo", "Huachinera", "Huasabas", "Huatabampo", "Huepac", "Imuris", "La Colorada", "Magdalena", "Mazatan", "Moctezuma", "Naco", "Nacori Chico", "Nacozari de Garcia", "Navojoa", "Nogales", "Onavas", "Opodepe", "Oquitoa", "Pitiquito", "Puerto Peñasco", "Quiriego", "Rayon", "Rosario", "Sahuaripa", "San Felipe de Jesus", "San Ignacio Rio Muerto", "San Javier", "San Luis Rio Colorado", "San Miguel de Horcasitas", "San Pedro de la Cueva", "Santa Ana", "Santa Cruz", "Saric", "Soyopa", "Suaqui Grande", "Tepache", "Trincheras", "Tubutama", "Ures", "Villa Hidalgo", "Villa Pesqueira", "Yecora"],
    "Tabasco": ["Balancan", "Cardenas", "Centla", "Centro", "Comalcalco", "Cunduacan", "Emiliano Zapata", "Huimanguillo", "Jalapa", "Jalpa de Mendez", "Jonuta", "Macuspana", "Nacajuca", "Paraiso", "Tacotalpa", "Teapa", "Tenosique"],
    "Tamaulipas": ["Abasolo", "Aldama", "Altamira", "Antiguo Morelos", "Burgos", "Bustamante", "Camargo", "Casas", "Ciudad Madero", "Cruillas", "Gomez Farias", "Gonzalez", "GÃ¼emez", "Guerrero", "Gustavo Diaz Ordaz", "Hidalgo", "Jaumave", "Jimenez", "Llera", "Mainero", "Mante", "Matamoros", "Mendez", "Mier", "Miguel Aleman", "Miquihuana", "Nuevo Laredo", "Nuevo Morelos", "Ocampo", "Padilla", "Palmillas", "Reynosa", "Rio Bravo", "San Carlos", "San Fernando", "San Nicolas", "Soto La Marina", "Tampico", "Tula", "Valle Hermoso", "Victoria", "Villagran", "Xicotencatl"],
    "Tlaxcala": ["Acuamanala de Miguel Hidalgo", "Altzayanca", "Amaxac de Guerrero", "Apetatitlan de Antonio Carvajal", "Atlangatepec", "Apizaco", "Benito Juarez", "Calpulalpan", "Chiautempan", "Contla de Juan Cuamatzi", "Cuapiaxtla", "Cuaxomulco", "El Carmen Tequexquitla", "Emiliano Zapata", "Españita", "Huamantla", "Hueyotlipan", "Ixtacuixtla de Mariano Matamoros", "Ixtenco", "La Magdalena Tlaltelulco", "Lazaro Cardenas", "Mazatecochco de Jose Maria Morelos", "MuÃ±oz de Domingo Arenas", "Nanacamilpa de Mariano Arista", "Nativitas", "Panotla", "Papalotla de Xicohtencatl", "Sanctorum de Lazaro Cardenas", "San Damian Texoloc", "San Francisco Tetlanohcan", "San Jeronimo Zacualpan", "San Jose Teacalco", "San Juan Huactzinco", "San Lorenzo Axocomanitla", "San Lucas Tecopilco", "San Pablo del Monte", "Santa Ana Nopalucan", "Santa Apolonia Teacalco", "Santa Catarina Ayometla", "Santa Cruz Quilehtla", "Santa Cruz Tlaxcala", "Santa Isabel Xiloxoxtla", "Tenancingo", "Teolocholco", "Tepetitla de Lardizabal", "Tepeyanco", "Terrenate", "Tetla de la Solidaridad", "Tetlatlahuca", "Tlaxcala", "Tlaxco", "Tocatlan", "Totolac", "Tzompantepec", "Xaloztoc", "Xaltocan", "Xicohtzinco", "Yauhquemecan", "Zacatelco", "Zitlaltepec de Trinidad Sanchez Santos"],
    "Veracruz": ["Acajete", "Acatlan", "Acayucan", "Actopan", "Acula", "Acultzingo", "Agua Dulce", "alamo Temapache", "Alpatlahuac", "Alto Lucero de Gutierrez Barrios", "Altotonga", "Alvarado", "Amatitlan", "Amatlan de los Reyes", "angel R. Cabada", "Apazapan", "Aquila", "Astacinga", "Atlahuilco", "Atoyac", "Atzacan", "Atzalan", "Ayahualulco", "Banderilla", "Benito Juarez", "Boca del Rio", "Calcahualco", "Camaron de Tejeda", "Camerino Z. Mendoza", "Carlos A. Carrillo", "Carrillo Puerto", "Castillo de Teayo", "Catemaco", "Cazones de Herrera", "Cerro Azul", "Chacaltianguis", "Chalma", "Chiconamel", "Chiconquiaco", "Chicontepec", "Chinameca", "Chinampa de Gorostiza", "Chocaman", "Chontla", "Chumatlan", "Citlaltepetl", "Coacoatzintla", "Coahuitlan", "Coatepec", "Coatzacoalcos", "Coatzintla", "Coetzala", "Colipa", "Comapa", "Cordoba", "Cosamaloapan de Carpio", "Consautlan de Carvajal", "Coscomatepec", "Cosoleacaque", "Cotaxtla", "Coxquihui", "Coyutla", "Cuichapa", "Cuitlahuac", "El Higo", "Emiliano Zapata", "Espinal", "Filomeno Mata", "Fortin", "Gutierrez Zamora", "Hidalgotitlan", "Huayacocotla", "Hueyapan de Ocampo", "Huiloapan de Cuauhtemoc", "Ignacio de la Llave", "Ilamatlan", "Isla", "Ixcatepec", "Ixhuacan de los Reyes", "Ixhuatlancillo", "Ixhuatlan del Cafe", "Ixhuatlan de Madero", "Ixhuatlan del Sureste", "Ixmatlahuacan", "Ixtaczoquitlan", "Jalacingo", "Jalcomulco", "Jaltipan", "Jamapa", "Jesus Carranza", "Jilotepec", "Jose Azueta", "Juan Rodriguez Clara", "Juchique de Ferrer", "La Antigua", "Landero y Coss", "La Perla", "Las Choapas", "Las Minas", "Las Vigas de Ramirez", "Lerdo de Tejada", "Los Reyes", "Magdalena", "Maltrata", "Manlio Fabio Altamirano", "Mariano Escobedo", "Martinez de la Torre", "Mecatlan", "Mecayapan", "Medellin", "Miahuatlan", "Minatitlan", "Misantla", "Mixtla de Altamirano", "Moloacan", "Nanchital de Lazaro Cardenas del Rio", "Naolinco", "Naranjal", "Naranjos Amatlan", "Nautla", "Nogales", "Oluta", "Omealca", "Orizaba", "Otatitlan", "Oteapan", "Ozuluama de MascaÃ±eras", "Pajapan", "Panuco", "Papantla", "Paso del Macho", "Paso de Ovejas", "Perote", "Platon Sanchez", "Playa Vicente", "Poza Rica de Hidalgo", "Pueblo Viejo", "Puente Nacional", "Rafael Delgado", "Rafael Lucio", "Rio Blanco", "Saltabarranca", "San Andres Tenejapan", "San Andres Tuxtla", "San Juan Evangelista", "San Rafael", "Santiago Sochiapan", "Santiago Tuxtla", "Sayula de Aleman", "Soconusco",
        "Sochiapa", "Soledad Atzompa", "Soledad de Doblado", "Soteapan", "Tamalin", "Tamiahua", "Tampico Alto", "Tancoco", "Tantima", "Tantoyuca", "Tatatila", "Tatahuicapan de Juarez", "Tecolutla", "Tehuipango", "Tempoal", "Tenampa", "Tenochtitlan", "Teocelo", "Tepatlaxco", "Tepetlan", "Tepetzintla", "Tequila", "Texcatepec", "Texhuacan", "Texistepec", "Tezonapa", "Tihuatlan", "Tierra Blanca", "Tlacojalpan", "Tlacolulan", "Tlacotalpan", "Tlacotepec de Mejia", "Tlachichilco", "Tlalixcoyan", "Tlalnelhuayocan", "Tlaltetela", "Tlapacoyan", "Tlaquilpa", "Tlilapan", "Tomatlan", "Tonayan", "Totutla", "Tres Valles", "Tuxpan", "Tuxtilla", "ursulo Galvan", "Uxpanapa", "Vega de Alatorre", "Veracruz", "Villa Aldama", "Xalapa", "Xico", "Xoxocotla", "Yanga", "Yecuatla", "Zacualpan", "Zaragoza", "Zentla", "Zongolica", "Zontecomatlan", "Zozocolco de Hidalgo"],
    "Yucatán": ["Abala", "Acanceh", "Akil", "Baca", "Bokoba", "Buctzotz", "Cacalchen", "Calotmul", "Cansahcab", "Cantamayec", "Calestun", "Cenotillo", "Conkal", "Cuncunul", "Cuzama", "Chacsinkin", "Chankom", "Chapab", "Chemax", "Chicxulub Pueblo", "Chichimila", "Chikindzonot", "Chochola", "Chumayel", "Dzan", "Dzemul", "Dzidzantun", "Dzilam de Bravo", "Dzilam Gonzalez", "Dzitas", "Dzoncauich", "Espita", "Halacho", "Hocaba", "Hoctun", "Homun", "Huhi", "Hunucma", "Ixil", "Izamal", "Kanasin", "Kantunil", "Kaua", "Kinchil", "Kopoma", "Mama", "Mani", "Maxcanu", "Mayapan", "Merida", "Mococha", "Motul", "Muna", "Muxupip", "Opichen", "Oxkutzcab", "Panaba", "Peto", "Progreso", "Quintana Roo", "Rio Lagartos", "Sacalum", "Samahil", "Sanahcat", "San Felipe", "Santa Elena", "Seye", "Sinanche", "Sotuta", "Sucila", "Sudzal", "Suma de Hidalgo", "Tahdziu", "Tahmek", "Teabo", "Tecoh", "Tekal de Venegas", "Tekanto", "Tekax", "Tekit", "Tekom", "Telchac Pueblo", "Telchac Puerto", "Temax", "Temozon", "Tepakan", "Tetiz", "Teya", "Ticul", "Timucuy", "Tinum", "Tixcacalcupul", "Tixkokob", "Tixmehuac", "Tixpehual", "Tizimin", "Tunkas", "Tzucacab", "Uayma", "Ucu", "Uman", "Valladolid", "Xocchel", "Yaxcaba", "Yaxkukul", "Yobain"],
    "Zacatecas": ["Apozol", "Apulco", "Atolinga", "Benito Juarez", "Calera", "Cañitas de Felipe Pescador", "Concepcion del Oro", "Cuauhtemoc", "Chalchihuites", "Fresnillo", "Trinidad Garcia de la Cadena", "Genaro Codina", "General Enrique Estrada", "General Francisco R. Murguia", "El Plateado de Joaquin Amaro", "El Salvador", "General Panfilo Natera", "Guadalupe", "Huanusco", "Jalpa", "Jerez", "Jimenez del Teul", "Juan Aldama", "Juchipila", "Loreto", "Luis Moya", "Mazapil", "Melchor Ocampo", "Mezquital del Oro", "Miguel Auza", "Momax", "Monte Escobedo", "Morelos", "Moyahua de Estrada", "Nochistlan de Mejia", "Noria de angeles", "Ojocaliente", "Panuco", "Pinos", "Rio Grande", "Sain Alto", "Santa Maria de la Paz", "Sombrerete", "Susticacan", "Tabasco", "Tepechitlan", "Tepetongo", "Teul de Gonzalez Ortega", "Tlaltenango de Sanchez Roman", "Trancoso", "Valparaiso", "Vetagrande", "Villa de Cos", "Villa Garcia", "Villa Gonzalez Ortega", "Villa Hidalgo", "Villanueva", "Zacatecas"],
};

//Abre el div de nueva tarjeta
document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('addCardButton');
    const menu = document.getElementById('addCard');

    button.addEventListener('click', function () {
        // Toggle the hidden class on the menu
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        }
    });

});

//Abre el div de nueva direccion 

document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('addDirectionButton');
    const menu = document.getElementById('addDirection');

    button.addEventListener('click', function () {
        // Toggle the hidden class on the menu
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        }
    });
});


//Abre el modal para editar la tarjeta

function openEditModal(cardId, lastDigits, owner, mes, anio) {
    // Configurar la acción del formulario con el ID de la tarjeta
    //const form = document.getElementById('edit-card-form');
    //form.action = form.action.replace('ActualizarTarjeta', 'ActualizarTarjeta/' + cardId);

    const owner_input = document.getElementById('owner_edit');
    owner_input.value = owner;
    const mes_input = document.getElementById('mes_edit');
    mes_input.value = mes;
    const anio_input = document.getElementById('anio_edit');
    anio_input.value = anio;

    const id_input = document.getElementById('card_id_hidden');
    id_input.value = cardId;

    const put_input = document.getElementById('put');
    put_input.textContent = 'Editar Tarjeta ' + lastDigits;

    // Mostrar el modal
    const modal = document.getElementById('edit-card-modal');
    modal.classList.remove('hidden');
}

//abre el modal para editar la direccion

function openEditModalAddress(addressId, estado, municipio, colonia, cp, calle, num_ext, num_int) {
    // Configurar la acción del formulario con el ID de la tarjeta
    //const form = document.getElementById('edit-card-form');
    //form.action = form.action.replace('ActualizarTarjeta', 'ActualizarTarjeta/' + cardId);
    var mis_opts, num_opts;
    const id_input = document.getElementById('address_id_hidden');
    id_input.value = addressId;

    const estado_input = document.getElementById('estado_edit');
    //estado_input.value = estado;
    estado_input.options[0].value = estado;
    estado_input.options[0].text = estado;

    const municipio_input = document.getElementById('municipio_edit');
    //municipio_input.value = municipio;

    municipio_input.options[0].value = municipio;
    municipio_input.options[0].text = municipio;

    mis_opts = eval(municipiosPorEstado[estado]);
    num_opts = mis_opts.length;
    document.edit_address_form.municipio_edit.length = num_opts;
    for (let i = 1; i < num_opts; i++) {
        municipio_input.options[i].value = mis_opts[i];
        municipio_input.options[i].text = mis_opts[i];
    }

    const colonia_input = document.getElementById('colonia_edit');
    colonia_input.value = colonia;

    const cp_input = document.getElementById('cp_edit');
    cp_input.value = cp;

    const calle_input = document.getElementById('calle_edit');
    calle_input.value = calle;

    const num_ext_input = document.getElementById('num_ext_edit');
    num_ext_input.value = num_ext;

    const num_int_input = document.getElementById('num_int_edit');
    num_int_input.value = num_int;

    // Mostrar el modal
    const modal = document.getElementById('edit-address-modal');
    modal.classList.remove('hidden');
}

//cierra modal tarjetas

function closeModal() {
    const modal = document.getElementById('edit-card-modal');
    modal.classList.add('hidden');
}

//cierra el modal direcciones

function closeModalAddress() {
    const modal = document.getElementById('edit-address-modal');
    modal.classList.add('hidden');
}

//cambia el select del municipio

function cambiarSelect() {
    var estados, mis_opts, num_opts;


    estados = document.direccionform.estado[document.direccionform.estado.selectedIndex].value;
    console.log(estados)
    //console.log(municipiosPorEstado[estados]);
    if (estados != 0) {
        //selecionamos las cosas Correctas
        mis_opts = eval(municipiosPorEstado[estados]);
        //se calcula el numero de cosas
        num_opts = mis_opts.length;
        //marco el numero de opt en el select
        document.direccionform.municipio.length = num_opts;
        //para cada opt del array, la pongo en el select
        for (let i = 0; i < num_opts; i++) {
            document.direccionform.municipio.options[i].value = mis_opts[i];
            document.direccionform.municipio.options[i].text = mis_opts[i];
        }
    } else {
        //si no habia ninguna opt seleccionada, elimino las cosas del select
        document.direccionform.municipio.length = 1;
        //ponemos un guion en la unica opt que he dejado
        document.direccionform.municipio.options[0].value = "0";
        document.direccionform.municipio.options[0].text = "-";
    }
    //hacer un reset de las opts
    document.direccionform.municipio.options[0].selected = true;

}

//cambia el select del municipio en el modal

function cambiarSelectEdit() {
    var estados, mis_opts, num_opts;
    estados = document.edit_address_form.estado_edit[document.edit_address_form.estado_edit.selectedIndex].value;
    //console.log(municipiosPorEstado[estados]);
    if (estados != 0) {
        //selecionamos las cosas Correctas
        mis_opts = eval(municipiosPorEstado[estados]);
        //se calcula el numero de cosas
        num_opts = mis_opts.length;
        //marco el numero de opt en el select
        document.edit_address_form.municipio_edit.length = num_opts;
        //para cada opt del array, la pongo en el select
        for (let i = 0; i < num_opts; i++) {
            document.edit_address_form.municipio_edit.options[i].value = mis_opts[i];
            document.edit_address_form.municipio_edit.options[i].text = mis_opts[i];
        }
    } else {
        //si no habia ninguna opt seleccionada, elimino las cosas del select
        document.edit_address_form.municipio_edit.length = 1;
        //ponemos un guion en la unica opt que he dejado
        document.edit_address_form.municipio_edit.options[0].value = "0";
        document.edit_address_form.municipio_edit.options[0].text = "-";
    }
    //hacer un reset de las opts
    document.edit_address_form.municipio_edit.options[0].selected = true;


}

/*
const mp = new MercadoPago("TEST-8135525e-704d-4cd9-86b8-451bc1beddfd");


const formElement = document.getElementById('form-checkout');
//formElement.addEventListener('submit', createCardToken);



async function createCardToken(event) {
    try {

        const cardholderNameElement = mp.fields.create('cardholderName', {
            placeholder: "Nombre del propietario"
        }).mount('owner');
        const cardNumberElement = mp.fields.create('cardNumber', {
            placeholder: "Número de la tarjeta"
        }).mount('num_tarjeta');
        const expirationMonthElement = mp.fields.create('expirationMonth', {
            placeholder: "MM",
        }).mount('mes');
        const expirationYearElement = mp.fields.create('expirationYear', {
            placeholder: "YY",
        }).mount('anio');
        const securityCodeElement = mp.fields.create('securityCode', {
            placeholder: "CVV"
        }).mount('cvv');
        const tokenElement = document.getElementById('cardToken');
        if (!tokenElement.value) {
            event.preventDefault();
            const token = await mp.fields.createCardToken({
                cardholderName: cardholderNameElement,
                cardNumber: cardNumberElement,
                expirationMonth: expirationMonthElement,
                expirationYear: expirationYearElement,
                securityCode: securityCodeElement,
            });
            tokenElement.value = token.id;
            formElement.requestSubmit();

        }
    } catch (e) {
        console.error('error creating card token: ', e)
    }
}

formElement.addEventListener('submit', function (event) {
    console.log('hello')
    const cardForm = mp.cardForm({
        autoMount: true,
        form: {
            id: 'form-checkout',
            cardholderName: {
                id: 'owner',
            },
            cardNumber: {
                id: 'num_tarjeta',
            },
            expirationMonth: {
                id: 'mes',
            },
            expirationYear: {
                id: 'anio',
            },
            securityCode: {
                id: 'cvv',
            },
        },
        callbacks: {
            onSubmit: event => {
                event.preventDefault();
                console.log('Submitting form and creating token...');
                cardForm.createCardToken().then(response => {
                    document.getElementById('cardToken').value = response.id;
                    console.log(response.id);
                    document.getElementById('form-checkout').submit();
                }).catch(error => {
                    console.error('Tokenización fallida:', error);
                });
            },
            onFetching: resource => {
                console.log('Fetching card details...');
                document.querySelector('button[type="submit"]').disabled = true;
                return () => document.querySelector('button[type="submit"]').disabled = false;
            }
        }
    });
});
*/



window.cambiarSelect = cambiarSelect;
window.cambiarSelectEdit = cambiarSelectEdit;
window.openEditModal = openEditModal;
window.closeModal = closeModal;
window.openEditModalAddress = openEditModalAddress;
window.closeModalAddress = closeModalAddress;