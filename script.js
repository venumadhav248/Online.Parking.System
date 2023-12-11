const container = document.querySelector('.container');
const seats = document.querySelectorAll('.row .slot:not(.occupied');
const count = document.getElementById('count');
const total = document.getElementById('total');
const vehicleSelect = document.getElementById('vehicle');

populateUI();
let ticketPrice = +vehicleSelect.value;

// Save selected movie index and price
function setvehicleData(vehicleIndex, moviePrice) {
  localStorage.setItem('selectedvehicleIndex', vehicleIndex);
  localStorage.setItem('selectedvehiclePrice', vehiclePrice);
}

// update total and count
function updateSelectedCount() {
  const selectedSlots = document.querySelectorAll('.row .slot.selected');

 // const slotsIndex = [...selectedSlots].map((slot) => [...slots].indexOf(slot));

  localStorage.setItem('selectedSlots', JSON.stringify(slotsIndex));

  //copy selected seats into arr
  // map through array
  //return new array of indexes

  const selectedSlotsCount = selectedSlots.length;

  count.innerText = selectedSlotsCount;
  total.innerText = selectedSlotsCount * ticketPrice;
}

// get data from localstorage and populate ui
function populateUI() {
  const selectedSlots = JSON.parse(localStorage.getItem('selectedSlots'));
  if (selectedSlots !== null && selectedSlots.length > 0) {
    slots.forEach((slot, index) => {
      if (selectedSlots.indexOf(index) > -1) {
        slot.classList.add('selected');
      }
    });
  }

  const selectedvehicleIndex = localStorage.getItem('selectedvehicleIndex');

  if (selectedvehicleIndex !== null) {
    vehicleSelect.selectedIndex = selectedvehicleIndex;
  }
}

// Movie select event
vehicleSelect.addEventListener('change', (e) => {
  ticketPrice = +e.target.value;
  setvehicleData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();
});

// Seat click event
container.addEventListener('click', (e) => {
  if (e.target.classList.contains('slot') && !e.target.classList.contains('occupied')) {
    e.target.classList.toggle('selected');

    updateSelectedCount();
  }
});

// intial count and total
updateSelectedCount();
//const btnPopup=document.querySelector('. btnBook-popup');
//btnPopup.addEventListener('click',()=>{
  //  WebTransportDatagramDuplexStream.classList.add('active-popup');
//});


//document.getElementById("button1").addEventListener("click", function(){
  //  document.querySelector(".popup").style.display= "flex";
//})
  //document.querySelector(".close").addEventListener("click",function(){
    //document.querySelector(".popup").style.display="none";

  //})