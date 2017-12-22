<head>
   <title>BamBuilder</title>
   <link rel="stylesheet" href="view.css">
   <script type="text/javascript" src="view.js"></script>
   <style>
   body {font-family: Arial;}

   /* Style the tab */
   .tab {
       overflow: hidden;
       border: 1px solid #ccc;
       background-color: #f1f1f1;
   }

   /* Style the buttons inside the tab */
   .tab button {
       background-color: inherit;
       float: left;
       border: none;
       outline: none;
       cursor: pointer;
       padding: 14px 16px;
       transition: 0.3s;
       font-size: 17px;
   }

   /* Change background color of buttons on hover */
   .tab button:hover {
       background-color: #ddd;
   }

   /* Create an active/current tablink class */
   .tab button.active {
       background-color: #ccc;
   }

   /* Style the tab content */
   .tabcontent {
       display: none;
       padding: 6px 12px;
       border: 1px solid #ccc;
       border-top: none;
   }
   </style>
   <script>
      //THIS SCRIPT LOADS DATA FOR TEAMBUILER.
      //WAIT FOR BAMDEX TO FINISH AND CONNECT ALL SHEETS TO DO THIS PART

      //---------------------------------------------------------------------------
        // load strings from php here

        var abilitiesData = <?php $url='https://docs.google.com/spreadsheets/d/e/2PACX-1vQze6QQywdWXeGwQBmGpsoZEa48HuBGW6kPDG7qu9T9S6egprBVsj9h5JzBNlmVladUAkUsmxBFdI1V/pub?gid=868060849&single=true&output=csv';
         if (($handle = fopen($url, "r")) !== FALSE) {
         	$result="";
         	while (($data = fgetcsv($handle, 100000, ",")) !== FALSE){
         		$totalrows = count($data);
         		for ($row=0; $row<=$totalrows; $row++){
         			if ( (strlen($data[$row])>0)){
         				$result.=$data[$row].'~';
         			}
         		}
         	}
         	fclose($handle);
         }
         echo json_encode($result, JSON_HEX_TAG);?>;

        var movesData = <?php $url='https://docs.google.com/spreadsheets/d/e/2PACX-1vQze6QQywdWXeGwQBmGpsoZEa48HuBGW6kPDG7qu9T9S6egprBVsj9h5JzBNlmVladUAkUsmxBFdI1V/pub?gid=0&single=true&output=csv';
         if (($handle = fopen($url, "r")) !== FALSE) {
         	$result="";
         	while (($data = fgetcsv($handle, 100000, ",")) !== FALSE){
         		$totalrows = count($data);
         		for ($row=0; $row<=$totalrows; $row++){
         			if ( (strlen($data[$row])>0)){
         				$result.=$data[$row].'~';
         			}
         		}
         	}
         	fclose($handle);
         }
         echo json_encode($result, JSON_HEX_TAG);?>;

        var pokemonData = <?php $url='https://docs.google.com/spreadsheets/d/e/2PACX-1vQze6QQywdWXeGwQBmGpsoZEa48HuBGW6kPDG7qu9T9S6egprBVsj9h5JzBNlmVladUAkUsmxBFdI1V/pub?gid=804537216&single=true&output=csv';
         if (($handle = fopen($url, "r")) !== FALSE) {
         	$result="";
         	while (($data = fgetcsv($handle, 100000, ",")) !== FALSE){
         		$totalrows = count($data);
         		for ($row=0; $row<=$totalrows; $row++){
         			if ( (strlen($data[$row])>0)){
         				$result.=$data[$row].'~';
         			}
         		}
         	}
         	fclose($handle);
         }
         echo json_encode($result, JSON_HEX_TAG);?>;

        var movesetData = <?php $url='https://docs.google.com/spreadsheets/d/e/2PACX-1vQze6QQywdWXeGwQBmGpsoZEa48HuBGW6kPDG7qu9T9S6egprBVsj9h5JzBNlmVladUAkUsmxBFdI1V/pub?gid=164485203&single=true&output=csv';
         if (($handle = fopen($url, "r")) !== FALSE) {
         	$result="";
         	while (($data = fgetcsv($handle, 100000, ",")) !== FALSE){
         		$totalrows = count($data);
         		for ($row=0; $row<=$totalrows; $row++){
         			if ( (strlen($data[$row])>0)){
         				$result.=$data[$row].'~';
         			}
         		}
         	}
         	fclose($handle);
         }
         echo json_encode($result, JSON_HEX_TAG);?>;

        var ItemData = <?php $url='https://docs.google.com/spreadsheets/d/e/2PACX-1vQze6QQywdWXeGwQBmGpsoZEa48HuBGW6kPDG7qu9T9S6egprBVsj9h5JzBNlmVladUAkUsmxBFdI1V/pub?gid=1468271958&single=true&output=csv';
         if (($handle = fopen($url, "r")) !== FALSE) {
         	$result="";
         	while (($data = fgetcsv($handle, 100000, ",")) !== FALSE){
         		$totalrows = count($data);
         		for ($row=0; $row<=$totalrows; $row++){
         			if ( (strlen($data[$row])>0)){
         				$result.=$data[$row].'~';
         			}
         		}
         	}
         	fclose($handle);
         }
         echo json_encode($result, JSON_HEX_TAG);?>
      //---------------------------------------------------------------------
        //loop through strings for "2D" array
        var abilities = [];
        var moves = [];
        var pokemon = [];
        //pokemon will have 3d array for movesets
        var items = [];

        var abilityNames = [];
        var abilityDescriptions = [];
        var idx = abilitiesData.indexOf("~");
        abilitiesData = abilitiesData.substring(idx+1);
        idx = abilitiesData.indexOf("~");
        var i = 0;
        abilitiesData = abilitiesData.substring(idx+1);
        while(abilitiesData.length>1){
          idx = abilitiesData.indexOf("~");
          abilityNames.push(abilitiesData.substring(0,idx));
          abilitiesData = abilitiesData.substring(idx+1);
          idx = abilitiesData.indexOf("~");
          abilityDescriptions.push(abilitiesData.substring(0,idx));
          abilitiesData = abilitiesData.substring(idx+1);
          i++;
        }
        i=0;
        abilities.push(abilityNames);
        abilities.push(abilityDescriptions);
      console.log(abilities);


        var moveNames = [];
        var moveType = [];
        var moveCatagory = [];
        var movePower = [];
        var moveAccuracy = [];
        var movePP = [];
        var moveDesc = [];
        for(i = 0; i < 7; i++){
          idx = movesData.indexOf("~");
            movesData = movesData.substring(idx+1);
      }
        i=0;
        while(movesData.length > 0){
          idx = movesData.indexOf("~");
          moveNames.push(movesData.substring(0,idx));
          movesData = movesData.substring(idx+1);
          idx = movesData.indexOf("~");
          moveType.push(movesData.substring(0,idx));
          movesData = movesData.substring(idx+1);
          idx = movesData.indexOf("~");
          moveCatagory.push(movesData.substring(0,idx));
          movesData = movesData.substring(idx+1);
          idx = movesData.indexOf("~");
          movePower.push(movesData.substring(0,idx));
          movesData = movesData.substring(idx+1);
          idx = movesData.indexOf("~");
          moveAccuracy.push(movesData.substring(0,idx));
          movesData = movesData.substring(idx+1);
          idx = movesData.indexOf("~");
          movePP.push(movesData.substring(0,idx));
          movesData = movesData.substring(idx+1);
          idx = movesData.indexOf("~");
          moveDesc.push(movesData.substring(0,idx));
          movesData = movesData.substring(idx+1);
          i++;
        }
        i=0;
        moves.push(moveNames);
        moves.push(moveType);
        moves.push(moveCatagory);
        moves.push(movePower);
        moves.push(moveAccuracy);
        moves.push(movePP);
        moves.push(moveDesc);
        console.log(moves);



        var itemName = [];
        var itemImage = [];
        var itemDesc = [];
        var idx = ItemData.indexOf("~");
        ItemData = ItemData.substring(idx+1);
        idx = ItemData.indexOf("~");
        ItemData = ItemData.substring(idx+1);
        idx = ItemData.indexOf("~");
        ItemData = ItemData.substring(idx+1);
        while(ItemData.length>1){
          idx = ItemData.indexOf("~");
          itemImage.push(ItemData.substring(0,idx));
          ItemData = ItemData.substring(idx+1);
          idx = ItemData.indexOf("~");
          itemName.push(ItemData.substring(0,idx));
          ItemData = ItemData.substring(idx+1);
          idx = ItemData.indexOf("~");
          itemDesc.push(ItemData.substring(0,idx));
          ItemData = ItemData.substring(idx+1);
          i++;
        }
        i=0;
        items.push(itemName);
        items.push(itemImage);
        items.push(itemDesc);
        console.log(items);


        var pokemonName = [];
        var type1 = [];
        var type2 = [];
        var hp = [];
        var atk = [];
        var def = [];
        var spa = [];
        var spd = [];
        var spe = [];
        var bst = [];
        var ability1 = [];
        var ability2 = [];
        var ability3 = [];

        for(i = 0; i < 13; i++){
            idx = pokemonData.indexOf("~");
            pokemonData = pokemonData.substring(idx+1);
        }
        i=0;
        while(pokemonData.length > 0){
          idx = pokemonData.indexOf("~");
          pokemonName.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          type1Data = pokemonData.substring(0,idx);
          if(type1Data.indexOf("*") == -1){
            type1.push(type1Data);
            pokemonData = pokemonData.substring(idx+1);
            idx = pokemonData.indexOf("~");
            type2.push(pokemonData.substring(0,idx));
            pokemonData = pokemonData.substring(idx+1);
          }
          else{
            type1.push(type1Data.substring(0,type1Data.length-1));
            pokemonData = pokemonData.substring(idx+1);
            type2.push("-");
          }
          idx = pokemonData.indexOf("~");
          hp.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          atk.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          def.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          spa.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          spd.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          spe.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          bst.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          ability1.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          ability2.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          idx = pokemonData.indexOf("~");
          ability3.push(pokemonData.substring(0,idx));
          pokemonData = pokemonData.substring(idx+1);
          i++;
        }
        i=0;
        pokemon.push(pokemonName);
        pokemon.push(type1);
        pokemon.push(type2);
        pokemon.push(hp);
        pokemon.push(atk);
        pokemon.push(def);
        pokemon.push(spa);
        pokemon.push(spd);
        pokemon.push(spe);
        pokemon.push(bst);
        pokemon.push(ability1);
        pokemon.push(ability2);
        pokemon.push(ability3);

        var allMovesets = [];
        var moveset = [];
        var loadingMoves = false;
        movesetData = movesetData.replace(/\n/g, ' ');
        i = 0;
        var j = 0
        while(movesetData.length > 0){
          idx = movesetData.indexOf("~");
          var cell = movesetData.substring(0,idx)
          movesetData = movesetData.substring(idx+1);
          if(cell == pokemon[0][i]){
            if(j > 0){
              allMovesets.push(moveset);
              moveset = [];
            }
            j = 0;
            i++;
          }
          else{
            moveset.push(cell);
            j++;
          }

        }
        allMovesets.push(moveset);
        pokemon.push(allMovesets);

      var selectedPokemon = [0,0,0,0,0,0];
      var selectedAbility1= ['','','','','',''];
      var selectedAbility2= ['','','','','',''];
      var selectedAbility3= ['','','','','',''];
      var finalAbility= ['','','','','',''];
      var finalItem= ['','','','','',''];
      var selectedmoves = [['','','',''],['','','',''],['','','',''],['','','',''],['','','',''],['','','','']];


      //--------------------------------------------------------------------
      var pageNum = 1;

      function pokemonTable(x){
console.log(pokemon);
      pageNum = x.id.substring(x.id.length-1);
      var myTable = "<table class=\"viewer\" ><tr><th>Name</th><th>Type 1</th><th>Type 2</th><th>HP</th><th>Attack</th><th>Defense</th><th>Special Attack</th> <th>Special Defense</th><th>Speed</th><th>BST</th><th>Ability 1</th><th>Ability 2</th><th>Ability 3</th></tr>"
      for(i = 0; i < pokemon[0].length; i++){
      if(x.value == null || pokemon[0][i].toLowerCase().indexOf(x.value.toLowerCase())>=0||pokemon[1][i].toLowerCase().indexOf(x.value.toLowerCase())>=0||pokemon[2][i].toLowerCase().indexOf(x.value.toLowerCase())>=0|| pokemon[10][i].toLowerCase().indexOf(x.value.toLowerCase())>=0||pokemon[11][i].toLowerCase().indexOf(x.value.toLowerCase())>=0||pokemon[12][i].toLowerCase().indexOf(x.value.toLowerCase())>=0){
      myTable+="<tr onmouseover=\"makeBorder(this)\" onmouseoout=\"removeBorder(this)\" onclick=\"addPokemon("+i+")\">";
      for(j = 0; j < pokemon.length-1;j++){
        myTable+="<td>"+pokemon[j][i]+"</td>";
      }
      myTable+="</tr>";
      }
      }
      myTable += "</table>"
      document.getElementById("table").innerHTML = myTable;
      }



      function abilityTable(x){
      pageNum = x.id.substring(x.id.length-1);
      var myTable = "<table class=\"viewer\" ><tr><th>Ability</th><th>Description</th></tr>"
      for(i = 0; i < abilities[0].length; i++){
      if((abilities[0][i].toLowerCase() == selectedAbility1[pageNum-1].toLowerCase() || abilities[0][i].toLowerCase() == selectedAbility2[pageNum-1].toLowerCase().toLowerCase()  || abilities[0][i].toLowerCase() == selectedAbility3[pageNum-1].toLowerCase() )){
      myTable+="<tr onclick=\"addAbility("+i+")\">";
      myTable+="<td>"+abilities[0][i]+"</td>";
      myTable+="<td>"+abilities[1][i]+"</td>";
      myTable+="</tr>";
      }
      }
      myTable += "</table>"
      document.getElementById("table").innerHTML = myTable;
      }

      function itemTable(x){
      pageNum = x.id.substring(x.id.length-1);
      var myTable = "<table class=\"viewer\" ><tr><th>Item</th><th>Properties</th></tr>"
      for(i = 0; i < items[0].length; i++){
      if(x.value == null || items[1][i].toLowerCase().indexOf(x.value.toLowerCase())>=0){
      myTable+="<tr onclick=\"addItem("+i+")\">";
      myTable+="<td><img src=\""+items[2][i]+"\">"+items[1][i]+"</td>";
      myTable+="<td>"+items[0][i]+"</td>";
      myTable+="</tr>";
      }
      }
      myTable += "</table>"
      document.getElementById("table").innerHTML = myTable;
      }

      function moveTable(x){

      pageNum = x.id.substring(x.id.length-2,x.id.length-1);

      var myTable = "<table class=\"viewer\"><tr><th>Name</th><th>Type</th><th>Catogory</th><th>Power</th><th>Accuracy</th><th>PP</th><th>Effect</th></tr>"
      for(i = 0; i < moves[0].length; i++){
      for(j = 0; j < pokemon[13][selectedPokemon[pageNum-1]].length;j++){
      console.log(pokemon[13][selectedPokemon[pageNum-1]][j]);
      if(pokemon[13][selectedPokemon[pageNum-1]][j].toLowerCase() == moves[0][i].toLowerCase()  && (x.value == null || moves[0][i].indexOf(x.value)>=0 ||   moves[1][i].indexOf(x.value)>=0 ||         moves[2][i].indexOf(x.value)>=0
      || moves[6][i].indexOf(x.value)>=0)){
        myTable+="<tr onclick=\"addMove"+x.id.substring(x.id.length-1)+"("+i+")\">";
        myTable+="<td>"+moves[0][i]+"</td>";
        myTable+="<td>"+moves[1][i]+"</td>";
        myTable+="<td>"+moves[2][i]+"</td>";
        myTable+="<td>"+moves[3][i]+"</td>";
        myTable+="<td>"+moves[4][i]+"</td>";
        myTable+="<td>"+moves[5][i]+"</td>";
        myTable+="<td>"+moves[6][i]+"</td>";
        myTable+="</tr>";
      }
      }
      }
      myTable += "</table>"
      document.getElementById("table").innerHTML = myTable;
      }

      //what happens when you select pokemon
      function addPokemon(p){
      document.getElementById("Pokemon_"+pageNum).value = pokemon[0][p];
      selectedPokemon[pageNum-1]  = p;
      selectedAbility1[pageNum-1] = pokemon[10][p];
      selectedAbility2[pageNum-1]  = pokemon[11][p];
      selectedAbility3[pageNum-1]  = pokemon[12][p];
      document.getElementById("table").innerHTML = '';
      assignStatTotals();
      }

      function addAbility(a){
      document.getElementById("Ability_"+pageNum).value = abilities[0][a];
      finalAbility[pageNum-1]  = abilities[0][a];
      document.getElementById("table").innerHTML = '';
      }

      function addItem(a){
      document.getElementById("Item_"+pageNum).value = items[1][a];
      finalItem[pageNum-1]  = items[0][a];
      document.getElementById("table").innerHTML = '';
      }

      function addMovea(m){
        document.getElementById("Move"+pageNum+"a").value = moves[0][m];
        document.getElementById("table").innerHTML = '';
      }

      function addMoveb(m){
        document.getElementById("Move"+pageNum+"b").value = moves[0][m];
        document.getElementById("table").innerHTML = '';
      }

      function addMovec(m){
        document.getElementById("Move"+pageNum+"c").value = moves[0][m];
        document.getElementById("table").innerHTML = '';
      }

      function addMoved(m){
        document.getElementById("Move"+pageNum+"d").value = moves[0][m];
        document.getElementById("table").innerHTML = '';
      }


      function assignStatTotals(){
        var atkmod = 1;
        var defmod = 1;
        var spamod = 1;
        var spdmod = 1;
        var spemod = 1;
        var thisNature = document.getElementById("Nature_"+pageNum).value;
        if(thisNature == "Adamant"){
          atkmod = 1.1;
          spamod = .9;
        }
        if(thisNature == "Bold"){
          defmod = 1.1;
          atkmod = .9;
        }
        if(thisNature == "Brave"){
          atkmod = 1.1;
          spemod = .9;
        }
        if(thisNature == "Calm"){
          spdmod = 1.1;
          atkmod = .9;
        }
        if(thisNature == "Careful"){
          spdmod = 1.1;
          spamod = .9;
        }
        if(thisNature == "Gentle"){
          spdmod = 1.1;
          defmod = .9;
        }
        if(thisNature == "Hasty"){
          spemod = 1.1;
          spamod = .9;
        }
        if(thisNature == "Impish"){
          defmod = 1.1;
          spamod = .9;
        }
        if(thisNature == "Jolly"){
          spemod = 1.1;
          spamod = .9;
        }
        if(thisNature == "Lax"){
          defmod = 1.1;
          spdmod = .9;
        }
        if(thisNature == "Lonely"){
          atkmod = 1.1;
          defmod = .9;
        }
        if(thisNature == "Mild"){
          spamod = 1.1;
          defmod = .9;
        }
        if(thisNature == "Modest"){
          spamod = 1.1;
          atkmod = .9;
        }
        if(thisNature == "Naive"){
          spemod = 1.1;
          spdmod = .9;
        }
        if(thisNature == "Naughty"){
          atkmod = 1.1;
          spdmod = .9;
        }
        if(thisNature == "Quiet"){
          spamod = 1.1;
          spemod = .9;
        }
        if(thisNature == "Rash"){
          spamod = 1.1;
          spdmod = .9;
        }
        if(thisNature == "Relaxed"){
          defmod = 1.1;
          spemod = .9;
        }
        if(thisNature == "Sassy"){
          spdmod = 1.1;
          spemod = .9;
        }
        if(thisNature == "Timid"){
          spemod = 1.1;
          atkmod = .9;
        }
        var base = parseFloat(pokemon[3][selectedPokemon[pageNum-1]]);
        var iv = parseFloat(document.getElementById("HPIV"+pageNum).value);
        var ev= parseFloat(document.getElementById("HP"+pageNum).value);
        var hpTotal = ((base)*2+iv+(ev/4))+110;
        document.getElementById("HPTOTAL"+pageNum).innerHTML = hpTotal;
        var base =parseFloat( pokemon[4][selectedPokemon[pageNum-1]]);
        var iv = parseFloat(document.getElementById("ATKIV"+pageNum).value);
        var ev= parseFloat(document.getElementById("ATK"+pageNum).value);
        document.getElementById("ATKTOTAL"+pageNum).innerHTML = parseInt(atkmod*mostStats(base,ev,iv));
        var base = parseFloat(pokemon[5][selectedPokemon[pageNum-1]]);
        var iv = parseFloat(document.getElementById("DEFIV"+pageNum).value);
        var ev= parseFloat(document.getElementById("DEF"+pageNum).value);
        document.getElementById("DEFTOTAL"+pageNum).innerHTML = parseInt(defmod*mostStats(base,ev,iv));
        var base = parseFloat(pokemon[6][selectedPokemon[pageNum-1]]);
        var iv = parseFloat(document.getElementById("SPAIV"+pageNum).value);
        var ev= parseFloat(document.getElementById("SPA"+pageNum).value);
        document.getElementById("SPATOTAL"+pageNum).innerHTML = parseInt(spamod*mostStats(base,ev,iv));
        var base = parseFloat(pokemon[7][selectedPokemon[pageNum-1]]);
        var iv = parseFloat(document.getElementById("SPDIV"+pageNum).value);
        var ev= parseFloat(document.getElementById("SPD"+pageNum).value);
        document.getElementById("SPDTOTAL"+pageNum).innerHTML = parseInt(spdmod*mostStats(base,ev,iv));
        var base =parseFloat( pokemon[8][selectedPokemon[pageNum-1]]);
        var iv = parseFloat(document.getElementById("SPEIV"+pageNum).value);
        var ev= parseFloat(document.getElementById("SPE"+pageNum).value);
        document.getElementById("SPETOTAL"+pageNum).innerHTML = parseInt(spemod*mostStats(base,ev,iv));
      }

      function mostStats(baseStat, evs, ivs){
        return ((baseStat)*2+ivs+(evs)/4)+5;
      }

function removeBorder(x){
  x.style.border="0px";
}
function makeBorder(x){
  x.style.border="border: 2px solid #ffffff;";
}

function updateStatSlider(x, sc, pn){
  var value = (x.value-1) * 4;
  var locStr = 0;
  switch(sc){
    case 1: locStr = "HP"; break;
    case 2: locStr = "ATK"; break;
    case 3: locStr = "DEF"; break;
    case 4: locStr = "SPA"; break;
    case 5: locStr = "SPD"; break;
    default: locStr = "SPE"; break;
  }
  document.getElementById(locStr+pn).value = value;
  assignStatTotals();
}

function updateStatText(x, sc, pn){
          console.log("texting");
  var value = x.value/4+1;
  var locStr = 0;
  switch(sc){
    case 1: locStr = "HP"; break;
    case 2: locStr = "ATK"; break;
    case 3: locStr = "DEF"; break;
    case 4: locStr = "SPA"; break;
    case 5: locStr = "SPD"; break;
    default: locStr = "SPE"; break;
  }
  document.getElementById(locStr+"SLIDER"+pn).value = value;
  assignStatTotals();
}

      //---------------------------------------------------------------------
   </script>

   <style>

   .viewer{
   	width: 1600px;
   	padding: 0;
   	margin: 0;
    margin-top: 10px;
   	color: #ffffff;
    border-spacing: 0;
    overflow: auto;
    overflow-y: scroll;
   }

   .viewer td, th{
   	margin: 0;
   	padding: 8px;
   	padding-top: 8px;
   	padding-bottom: 8px;
   	border-collapse: collapse;
   }

   .viewer tr{
     border: 2px solid #000;
   }

   .viewer tr:nth-child(even){background-color: rgba(255,255,255,.1);border:2px solid transparent;}
   .viewer tr:nth-child(odd){background-color: rgba(255,255,255,.05);border:2px solid transparent;}
   tr:hover {border-radius: 20px 20px 20px 20px;
 -webkit-border-radius: 20px;
 -moz-border-radius: 20px;
 -khtml-border-radius: 20px; box-shadow: 0 0 0 3px #fff;margin: 12px;background-color: rgba(255,255,255,.4);}

   </style>
</head>

   <body id="main_body" >
      <img id="top" src="top.png" alt="">
      <div id="form_container">
         <h1><a>Untitled Form</a></h1>
         <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'p1')">Pokemon 1</button>
            <button class="tablinks" onclick="openCity(event, 'p2')">Pokemon 2</button>
            <button class="tablinks" onclick="openCity(event, 'p3')">Pokemon 3</button>
            <button class="tablinks" onclick="openCity(event, 'p4')">Pokemon 4</button>
            <button class="tablinks" onclick="openCity(event, 'p5')">Pokemon 5</button>
            <button class="tablinks" onclick="openCity(event, 'p6')">Pokemon 6</button>
         </div>
         <div id="p1" class="tabcontent">
            <form id="form_64191" class="appnitro"  method="post" action="">
               <center>
               <table style="vertical-align: top;">
                  <tr>
                     <td style="vertical-align: top;" width="40%">
                        <label class="description" for="Pokemon_1">Pokemon </label>
                        <div>
                           <input  onclick = "pokemonTable(this)" id="Pokemon_1" class="element text medium" type="text" maxlength="255" value="" onkeyup="pokemonTable(this)" />
                        </div>
                        <label class="description" for="Nickname_1">Nickname </label>
                        <div>
                           <input id="Nickname_1" class="element text medium"  type="text" maxlength="255" value=""/>
                        </div>
                        <label class="description" for="Ability_1">Ability </label>
                        <div>
                           <input id="Ability_1" class="element text medium" type="text" onclick="abilityTable(this)" onkeyup="abilityTable(this)" maxlength="255" value=""/>
                        </div>
                        <label class="description" for="Item_1">Item </label>
                        <div>
                           <input id="Item_1" class="element text medium" type="text" maxlength="255" value="" onclick="itemTable(this)" onkeyup="itemTable(this)"/>
                        </div>
                     </td>
                     <td width="40%" style="vertical-align: top;">
                        <label class="description" for="Move1a"> Moves:</label>
                        <label class="description" for="Move1a"> </label>
                        <div>
                           <input id="Move1a" class="element text medium" type="text" onclick="moveTable(this)" onkeyup="moveTable(this)" maxlength="255" value=""/>
                        </div>
                        <label class="description" for="Move1b"> </label>
                        <div>
                           <input id="Move1b" name="element_8" class="element text medium"  onclick="moveTable(this)" onkeyup="moveTable(this)" type="text" maxlength="255" value=""/>
                        </div>
                        <label class="description" for="Move1c"> </label>
                        <div>
                           <input id="Move1c" name="element_7" class="element text medium"  onclick="moveTable(this)" onkeyup="moveTable(this)" type="text" maxlength="255" value=""/>
                        </div>
                        <label class="description" for="Move1d"> </label>
                        <div>
                           <input id="Move1d" name="element_6" class="element text medium"  onclick="moveTable(this)" onkeyup="moveTable(this)" type="text" maxlength="255" value=""/><br><br>
                        </div>
                        <label class="description" for="Nature_1">Nature </label>
                        <div>
                           <select onmouseup="assignStatTotals()" class="element select medium" id="Nature_1" name="Nature">
                              <option value="Adamant">Adamant (+Atk, -SpA)</option>
                              <option value="Bashful">Bashful</option>
                              <option value="Bold">Bold (+Def, -Atk)</option>
                              <option value="Brave">Brave (+Atk, -Spe)</option>
                              <option value="Calm">Calm (+SpD, -Atk)</option>
                              <option value="Careful">Careful (+SpD, -SpA)</option>
                              <option value="Docile">Docile</option>
                              <option value="Gentle">Gentle (+SpD, -Def)</option>
                              <option value="Hardy">Hardy</option>
                              <option value="Hasty">Hasty (+Spe, -Def)</option>
                              <option value="Impish">Impish (+Def, -SpA)</option>
                              <option value="Jolly">Jolly (+Spe, -SpA)</option>
                              <option value="Lax">Lax (+Def, -SpD)</option>
                              <option value="Lonely">Lonely (+Atk, -Def)</option>
                              <option value="Mild">Mild (+SpA, -Def)</option>
                              <option value="Modest">Modest (+SpA, -Atk)</option>
                              <option value="Naive">Naive (+Spe, -SpD)</option>
                              <option value="Naughty">Naughty (+Atk, -SpD)</option>
                              <option value="Quiet">Quiet (+SpA, -Spe)</option>
                              <option value="Quirky">Quirky</option>
                              <option value="Rash">Rash (+SpA, -SpD)</option>
                              <option value="Relaxed">Relaxed (+Def, -Spe)</option>
                              <option value="Sassy">Sassy (+SpD, -Spe)</option>
                              <option value="Serious" selected="selected">Serious</option>
                              <option value="Timid">Timid (+Spe, -Atk)</option>
                           </select>
                        </div>
                        <br>
                     </td>
                     <td style="vertical-align: top;" width="20%">
                        <label class="description" for="Evs_1">EVS/IVS: </label>
                        <table style="text-align:right;">
                           <tr>
                              <td> <label class="description" for="Evs_1">HP:</label> </td>
                              <td><input onkeyup="updateStatText(this,1,1)" id="HP1" name="element_7" class="element text small" type="text" maxlength="3" value="0"/></td>
                              <td><input onmousemove="updateStatSlider(this,1,1)" type="range" min="1" max="64" value="1" id="HPSLIDER1"><br>
                              </td>
                              <td><input id="HPIV1" name="element_7" class="element text small" type="text" maxlength="2" value="31"/></td>
                              <td><label class="description" for="Evs_1" id="HPTOTAL1"  value="" >0</label></td>
                           </tr>
                           <tr>
                              <td>   <label class="description" for="Evs_1">Attack:</label></td>
                              <td><input onkeyup="updateStatText(this,2,1)" id="ATK1" name="element_7" class="element text small" type="text" maxlength="3" value="0"/></td>
                              <td><input onmousemove="updateStatSlider(this,2,1)" type="range" min="1" max="64" value="1" id="ATKSLIDER1"><br></td>
                              <td><input id="ATKIV1" name="element_7" class="element text small" type="text" maxlength="2" value="31"/></td>
                              <td><label class="description" for="Evs_1" id="ATKTOTAL1" value="" >0</label></td>
                           </tr>
                           </tr>
                           <tr>
                              <td>     <label class="description" for="Evs_1">Defense</label></td>
                              <td><input onkeyup="updateStatText(this,3,1)" id="DEF1" name="element_7" class="element text small" type="text" maxlength="3" value="0"/></td>
                              <td><input onmousemove="updateStatSlider(this,3,1)" type="range" min="1" max="64" value="1" id="DEFSLIDER1"><br></td>
                              <td><input id="DEFIV1" name="element_7" class="element text small" type="text" maxlength="2" value="31"/></td>
                              <td><label class="description" for="Evs_1" id="DEFTOTAL1" value="" >0</label></td>
                           </tr>
                           </tr>
                           <tr>
                              <td>    <label class="description" for="Evs_1">  Sp. Atk.</label></td>
                              <td><input onkeyup="updateStatText(this,4,1)"  id="SPA1" name="element_7" class="element text small" type="text" maxlength="3" value="0"/></td>
                              <td><input onmousemove="updateStatSlider(this,4,1)" type="range" min="1" max="64" value="1" id="SPASLIDER1"><br></td>
                              <td><input id="SPAIV1" name="element_7" class="element text small" type="text" maxlength="2" value="31"/></td>
                              <td><label class="description" for="Evs_1" id="SPATOTAL1" value="" >0</label></td>
                           </tr>
                           </tr>
                           <tr>
                              <td>     <label class="description" for="Evs_1"> Sp. Def.</label></td>
                              <td><input onkeyup="updateStatText(this,5,1)"  id="SPD1" name="element_7" class="element text small" type="text" maxlength="3" value="0"/></td>
                              <td><input onmousemove="updateStatSlider(this,5,1)" id="SPD1" type="range" min="1" max="64" value="1"><br></td>
                              <td><input id="SPDIV1" name="element_7" class="element text small" type="text" maxlength="2" value="31"/></td>
                              <td><label class="description" for="Evs_1" id="SPDTOTAL1" value="" >0</label></td>
                           </tr>
                           </tr>
                           <tr>
                              <td>      <label class="description" for="Evs_1"> Speed</label></td>
                              <td><input onkeyup="updateStatText(this,6,1)"  id="SPE1" name="element_7" class="element text small" type="text" maxlength="3" value="0"/></td>
                              <td><input onmousemove="updateStatSlider(this,6,1)" type="range" id="SPESLIDER1" min="1" max="64" value="1">
                              </td>
                              <td><input id="SPEIV1" name="element_7" class="element text small" type="text" maxlength="2" value="31"/></td>
                              <td><label class="description" for="Evs_1" id="SPETOTAL1" value="" >0</label></td>
                           </tr>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </form>
         </div>
         <div id="p2" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p>
         </div>
         <div id="p3" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
         </div>
         <div id="p4" class="tabcontent">
            <h3>France</h3>
            <p>Paris is the capital of France.</p>
         </div>
         <div id="p5" class="tabcontent">
            <h3>Japan</h3>
            <p>Tokyo is the capital of Japan.</p>
         </div>
         <div id="p6" class="tabcontent">
            <h3>England</h3>
            <p>London is the capital of England.</p>
         </div>
      </div>
      <script>
         function openCity(evt, cityName) {
           console.log(numPage);
           numPage = cityName.substring(1);
             var i, tabcontent, tablinks;
             tabcontent = document.getElementsByClassName("tabcontent");
             for (i = 0; i < tabcontent.length; i++) {
                 tabcontent[i].style.display = "none";
             }
             tablinks = document.getElementsByClassName("tablinks");
             for (i = 0; i < tablinks.length; i++) {
                 tablinks[i].className = tablinks[i].className.replace(" active", "");
             }
             document.getElementById(cityName).style.display = "block";
             evt.currentTarget.className += " active";
         }
         document.getElementById("table").innerHTML = '';
         openCity(event, 'p1')
      </script>

      <img id="bottom" src="bottom.png" alt="">
      <center><div id="table"></div></center>

</body>
