var links = document.querySelectorAll('a:not([target="_blank"])');
for (var i = 0; i < links.length; i++) {
  links[i].addEventListener('click', function() {
    var loadingDiv = document.getElementById('loader');
    loadingDiv.style.display = (loadingDiv.style.display === 'hidden' || loadingDiv.style.display === '') ? 'flex' : 'hidden';
  });
}

var loaders = document.querySelectorAll('.load');
for (var i = 0; i < loaders.length; i++) {
  loaders[i].addEventListener('click', function() {
    var loadingDiv = document.getElementById('loader');
    loadingDiv.style.display = (loadingDiv.style.display === 'hidden' || loadingDiv.style.display === '') ? 'flex' : 'hidden';
  });
}
