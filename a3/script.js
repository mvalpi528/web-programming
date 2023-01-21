/* Insert your javascript here */
window.onscroll = function () {
  //console.log("Win Y: " + window.scrollY);
};

const navLinks = document
  .getElementsByTagName("nav")[0]
  .getElementsByTagName("a");

const sections = document
  .getElementsByTagName("main")[0]
  .getElementsByTagName("section");

console.log(sections);
console.log(sections[0].offsetTop + "");

// 5.2 Price Calculation Client Side

let numStandardAdultSeats;
let numStandardConcessionSeats;
let numStandardChildSeats;
let numFirstClassAdultSeats;
let numFirstClassConcessionSeats;
let numFirstClassChildSeats;
let sessionTime;
let dataPricing;

function getNumStandardAdultSeats() {
  numStandardAdultSeats = parseInt(
    document.getElementById("standard-adult-seats").value
  );
  console.log(
    `The number of standard adult seats selected is ${numStandardAdultSeats}`
  );
}

function getNumStandardConcessionSeats() {
  numStandardConcessionSeats = parseInt(
    document.getElementById("standard-concession-seats").value
  );
  console.log(
    `The number of standard concession seats selected is ${numStandardConcessionSeats}`
  );
}

function getNumStandardChildSeats() {
  numStandardChildSeats = parseInt(
    document.getElementById("standard-child-seats").value
  );
  console.log(
    `The number of standard child seats selected is ${numStandardChildSeats}`
  );
}

// First class

function getNumFirstClassAdultSeats() {
  numFirstClassAdultSeats = parseInt(
    document.getElementById("first-class-adult-seats").value
  );
  console.log(
    `The number of first class adult seats selected is ${numFirstClassAdultSeats}`
  );
}

function getNumFirstClassConcessionSeats() {
  numFirstClassConcessionSeats = parseInt(
    document.getElementById("first-class-concession-seats").value
  );
  console.log(
    `The number of first class concession seats selected is ${numFirstClassConcessionSeats}`
  );
}

function getNumFirstClassChildSeats() {
  numFirstClassChildSeats = parseInt(
    document.getElementById("first-class-child-seats").value
  );
  console.log(
    `The number of first class child seats selected is ${numFirstClassChildSeats}`
  );
}

// get the session time to determine if the seats should be discounted or full price

function getSessionTime() {
  sessionTime = document.querySelector('input[name="day"]:checked').value;
  dataPricing = document
    .querySelector('input[name="day"]:checked')
    .getAttribute("data-pricing");
  console.log(sessionTime);
  console.log(dataPricing);
}

// Helper functions to get the price of the seat based on which session has been selected

// Standard Seats

function getStandardAdultSeatPrice() {
  console.log(dataPricing);
  if (dataPricing === "fullprice") {
    let standardAdultSeatPrice = parseFloat(
      document
        .getElementById("standard-adult-seats")
        .getAttribute("data-fullprice")
    );
    console.log(standardAdultSeatPrice);
  } else if (dataPricing === "discprice") {
    let standardAdultSeatPrice = parseFloat(
      document
        .getElementById("standard-adult-seats")
        .getAttribute("data-discprice")
    );
    console.log(standardAdultSeatPrice);
  }
}

function getStandardConcessionSeatPrice() {
  console.log(dataPricing);
  if (dataPricing === "fullprice") {
    let standardConcessionSeatPrice = parseFloat(
      document
        .getElementById("standard-concession-seats")
        .getAttribute("data-fullprice")
    );
    console.log(standardConcessionSeatPrice);
  } else if (dataPricing === "discprice") {
    let standardConcessionSeatPrice = parseFloat(
      document
        .getElementById("standard-concession-seats")
        .getAttribute("data-discprice")
    );
    console.log(standardConcessionSeatPrice);
  }
}

function getStandardChildSeatPrice() {
  console.log(dataPricing);
  if (dataPricing === "fullprice") {
    let standardChildSeatPrice = parseFloat(
      document
        .getElementById("standard-child-seats")
        .getAttribute("data-fullprice")
    );
    console.log(standardChildSeatPrice);
  } else if (dataPricing === "discprice") {
    let standardChildSeatPrice = parseFloat(
      document
        .getElementById("standard-child-seats")
        .getAttribute("data-discprice")
    );
    console.log(standardChildSeatPrice);
  }
}

// First Class Seats

function getFirstClassAdultSeatPrice() {
  console.log(dataPricing);
  if (dataPricing === "fullprice") {
    let firstClassAdultSeatPrice = parseFloat(
      document
        .getElementById("first-class-adult-seats")
        .getAttribute("data-fullprice")
    );
    console.log(firstClassAdultSeatPrice);
  } else if (dataPricing === "discprice") {
    let firstClassAdultSeatPrice = parseFloat(
      document
        .getElementById("first-class-adult-seats")
        .getAttribute("data-discprice")
    );
    console.log(firstClassAdultSeatPrice);
  }
}

function getFirstClassConcessionSeatPrice() {
  console.log(dataPricing);
  if (dataPricing === "fullprice") {
    let firstClassConcessionSeatPrice = parseFloat(
      document
        .getElementById("first-class-concession-seats")
        .getAttribute("data-fullprice")
    );
    console.log(firstClassConcessionSeatPrice);
  } else if (dataPricing === "discprice") {
    let firstClassConcessionSeatPrice = parseFloat(
      document
        .getElementById("first-class-concession-seats")
        .getAttribute("data-discprice")
    );
    console.log(firstClassConcessionSeatPrice);
  }
}

function getFirstClassChildSeatPrice() {
  console.log(dataPricing);
  if (dataPricing === "fullprice") {
    let firstClassChildSeatPrice = parseFloat(
      document
        .getElementById("first-class-child-seats")
        .getAttribute("data-fullprice")
    );
    console.log(firstClassChildSeatPrice);
  } else if (dataPricing === "discprice") {
    let firstClassChildSeatPrice = parseFloat(
      document
        .getElementById("first-class-child-seats")
        .getAttribute("data-discprice")
    );
    console.log(firstClassChildSeatPrice);
  }
}

// testing
document.body.addEventListener("dblclick", getStandardAdultSeatPrice);
document.body.addEventListener("dblclick", getStandardConcessionSeatPrice);
document.body.addEventListener("dblclick", getStandardChildSeatPrice);
document.body.addEventListener("dblclick", getFirstClassAdultSeatPrice);
document.body.addEventListener("dblclick", getFirstClassConcessionSeatPrice);
document.body.addEventListener("dblclick", getFirstClassChildSeatPrice);

function calculatePrice() {}
