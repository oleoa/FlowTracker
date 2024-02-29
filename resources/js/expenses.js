var recurring = document.getElementById('recurring');
var itEnds = document.getElementById('it_ends');
var endDate = document.getElementById('end_date');
var frequency = document.getElementById('frequency');

var itEndsDiv = document.getElementById('it_ends_div');
var endDateDiv = document.getElementById('end_date_div');
var frequencyDiv = document.getElementById('frequency_div');

if(recurring){
  recurring.addEventListener('change', function(){
    if(recurring.value == 'true')
    {
      frequencyDiv.classList.toggle('hidden');
      frequencyDiv.classList.toggle('flex');
      itEndsDiv.classList.toggle('hidden');
      itEndsDiv.classList.toggle('flex');
      if(itEnds.value == 'true')
      {
        endDateDiv.classList.remove('hidden');
        endDateDiv.classList.add('flex');
      }
    }
    else
    {
      frequencyDiv.classList.toggle('hidden');
      frequencyDiv.classList.toggle('flex');
      itEndsDiv.classList.toggle('hidden');
      itEndsDiv.classList.toggle('flex');
      endDateDiv.classList.add('hidden');
      endDateDiv.classList.remove('flex');
    }
  });
}

if(itEndsDiv){
  itEnds.addEventListener('change', function(){
    if(itEnds.value == 'true')
    {
      endDateDiv.classList.remove('hidden');
      endDateDiv.classList.add('flex');
    }
    else
    {
      endDateDiv.classList.add('hidden');
      endDateDiv.classList.remove('flex');
    }
  });
}
