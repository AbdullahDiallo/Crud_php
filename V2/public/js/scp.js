const text = 'Liste des rendez-vous'; const titleElement = document.getElementById('student-list-title'); let index = 0;   function typeText() { if (index < text.length) { titleElement.textContent += text.charAt(index); index++; setTimeout(typeText, 200);  } else { setTimeout(clearText, 2000);   } }  function clearText() { titleElement.textContent = ''; index = 0; setTimeout(typeText, 500);  }   typeText(); 