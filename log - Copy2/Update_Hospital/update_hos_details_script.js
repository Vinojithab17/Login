const hospitalNames = document.querySelectorAll(".hos-name");
const hospitals=document.querySelectorAll(".hospital");

const filterList = (searchTerm, optionsList) => {
    searchTerm = searchTerm.toLowerCase();
    optionsList.forEach((option) => {
      let label =
        option.innerText.toLowerCase();
      if (label.indexOf(searchTerm) != -1) {
        option.parentElement.style.display = "block";
      } else {
        option.parentElement.style.display = "none";
      }
    });
  };


document.querySelector(".search").addEventListener("keyup",function (e) {
    filterList(e.target.value, hospitalNames);
  }

);

hospitals.forEach(hospital=>{
  hospital.addEventListener("click",function(){
  
  console.log(hospital.childNodes[3].innerText);

  window.location.href = "./facilities_page.php";
  window.localStorage.setItem("parameter",hospital.textContent);
  // window.open("facilities_page.php","_self");

  });
});