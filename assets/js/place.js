function prov(){	
	var e = document.getElementById("provi");
	var provi = e.options[e.selectedIndex].value;
	if(provi == 'Anywhere'){
		var opt_muni =[
			"Anywhere",
			""
		];
	}
	else if(provi == 'Abra'){
		var opt_muni =[
			"Bangued",
			"Boliney",
			"Bucay",
			"Bucloc",
			"Daguioman",
			"Danglas",
			"Dolores",
			"La Paz",
			"Lacub",
			"Lagangilang",
			"Lagayan",
			"Langiden",
			"Licuan-Baay"
		];
	}else if(provi == 'Aurora'){
		var opt_muni =[
			"Baler",
			"Casiguran",
			"Dilasag",
			"Dinalungan",
			"Dingalan",
			"Dipaculao",
			"Maria Aurora",
			"San Luis"
		];
	}else if(provi == 'Albay'){
		var opt_muni =[
			"Bacacay",
			"Camalig",
			"Daraga",
			"Guinobatan",
			"Jovellar",
			"Legazpi City",
			"Libon",
			"Ligao City",
			"Malilipot",
			"Malinao",
			"Manito",
			"Oas",
			"Pio Duran",
			"Polangui",
			"Rapu-Rapu",
		];
	}
	document.getElementById('muni_city').options.length = 0;
	var y = document.getElementById('muni_city');
	var opt = document.createElement("option");
	opt.text = "Anywhere";
		
	y.add(opt);
	for(x=1;x<=opt_muni.length;x++){
		var y = document.getElementById('muni_city');
		var opt = document.createElement("option");
		opt.text = opt_muni[x-1];
		
		y.add(opt);
	}
}