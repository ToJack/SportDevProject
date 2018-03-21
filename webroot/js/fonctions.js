function AfficherForm(seance, heure_start, minute_start, heure_end, minute_end)
 {
   document.getElementById('FormReleve').style.display="block";
   var date= new Date(seance.date);
   var mois=date.getMonth()+1;
   if(heure_start<10)heure_start="0"+heure_start;
   if(minute_start<10)minute_start="0"+minute_start;
   if(heure_end<10)heure_end="0"+heure_end;
   if(minute_end<10)minute_end="0"+minute_end;
   document.getElementById('seanceReleve').innerHTML="Séance du "+date.getDate()+"/"+mois+"/"+date.getFullYear()+" : "+heure_start+"h"+minute_start+"-"+heure_end+"h"+minute_end+", "+seance.sport+" à "+seance.location_name;
   document.getElementById('idSeance').value=seance.id;
 }


 function AfficherContest()
 {
   
 }
