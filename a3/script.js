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

let numStandardAdultSeats = 0;
let numStandardConcessionSeats = 0;
let numStandardChildSeats = 0;
let numFirstClassAdultSeats = 0;
let numFirstClassConcessionSeats = 0;
let numFirstClassChildSeats = 0;
let sessionTime;
let dataPricing;

function getNumStandardAdultSeats() {
  numStandardAdultSeats = parseInt(
    document.getElementById("standard-adult-seats").value
  );
  /*
  console.log(
    `The number of standard adult seats selected is ${numStandardAdultSeats}`
  );
  */
}

function getNumStandardConcessionSeats() {
  numStandardConcessionSeats = parseInt(
    document.getElementById("standard-concession-seats").value
  );
  /*
  console.log(
    `The number of standard concession seats selected is ${numStandardConcessionSeats}`
  );
  */
}

function getNumStandardChildSeats() {
  numStandardChildSeats = parseInt(
    document.getElementById("standard-child-seats").value
  );
  /*
  console.log(
    `The number of standard child seats selected is ${numStandardChildSeats}`
  );
  */
}

// First class

function getNumFirstClassAdultSeats() {
  numFirstClassAdultSeats = parseInt(
    document.getElementById("first-class-adult-seats").value
  );
  /*
  console.log(
    `The number of first class adult seats selected is ${numFirstClassAdultSeats}`
  );
  */
}

function getNumFirstClassConcessionSeats() {
  numFirstClassConcessionSeats = parseInt(
    document.getElementById("first-class-concession-seats").value
  );
  /*
  console.log(
    `The number of first class concession seats selected is ${numFirstClassConcessionSeats}`
  );
  */
}

function getNumFirstClassChildSeats() {
  numFirstClassChildSeats = parseInt(
    document.getElementById("first-class-child-seats").value
  );
  /*
  console.log(
    `The number of first class child seats selected is ${numFirstClassChildSeats}`
  );
  */
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
  let standardAdultSeatPrice;
  if (dataPricing === "fullprice") {
    standardAdultSeatPrice = parseFloat(
      document
        .getElementById("standard-adult-seats")
        .getAttribute("data-fullprice")
    );
  } else if (dataPricing === "discprice") {
    standardAdultSeatPrice = parseFloat(
      document
        .getElementById("standard-adult-seats")
        .getAttribute("data-discprice")
    );
  }
  return standardAdultSeatPrice;
}

function getStandardConcessionSeatPrice() {
  let standardConcessionSeatPrice;
  if (dataPricing === "fullprice") {
    standardConcessionSeatPrice = parseFloat(
      document
        .getElementById("standard-concession-seats")
        .getAttribute("data-fullprice")
    );
  } else if (dataPricing === "discprice") {
    standardConcessionSeatPrice = parseFloat(
      document
        .getElementById("standard-concession-seats")
        .getAttribute("data-discprice")
    );
  }
  return standardConcessionSeatPrice;
}

function getStandardChildSeatPrice() {
  let standardChildSeatPrice;
  if (dataPricing === "fullprice") {
    standardChildSeatPrice = parseFloat(
      document
        .getElementById("standard-child-seats")
        .getAttribute("data-fullprice")
    );
  } else if (dataPricing === "discprice") {
    standardChildSeatPrice = parseFloat(
      document
        .getElementById("standard-child-seats")
        .getAttribute("data-discprice")
    );
  }
  return standardChildSeatPrice;
}

// First Class Seats

function getFirstClassAdultSeatPrice() {
  let firstClassAdultSeatPrice;
  if (dataPricing === "fullprice") {
    firstClassAdultSeatPrice = parseFloat(
      document
        .getElementById("first-class-adult-seats")
        .getAttribute("data-fullprice")
    );
  } else if (dataPricing === "discprice") {
    firstClassAdultSeatPrice = parseFloat(
      document
        .getElementById("first-class-adult-seats")
        .getAttribute("data-discprice")
    );
  }
  return firstClassAdultSeatPrice;
}

function getFirstClassConcessionSeatPrice() {
  let firstClassConcessionSeatPrice;
  if (dataPricing === "fullprice") {
    firstClassConcessionSeatPrice = parseFloat(
      document
        .getElementById("first-class-concession-seats")
        .getAttribute("data-fullprice")
    );
  } else if (dataPricing === "discprice") {
    firstClassConcessionSeatPrice = parseFloat(
      document
        .getElementById("first-class-concession-seats")
        .getAttribute("data-discprice")
    );
  }
  return firstClassConcessionSeatPrice;
}

function getFirstClassChildSeatPrice() {
  let firstClassChildSeatPrice;

  if (dataPricing === "fullprice") {
    firstClassChildSeatPrice = parseFloat(
      document
        .getElementById("first-class-child-seats")
        .getAttribute("data-fullprice")
    );
  } else if (dataPricing === "discprice") {
    firstClassChildSeatPrice = parseFloat(
      document
        .getElementById("first-class-child-seats")
        .getAttribute("data-discprice")
    );
  }
  return firstClassChildSeatPrice;
}

// testing
// document.body.addEventListener("dblclick", getStandardAdultSeatPrice);
// document.body.addEventListener("dblclick", getStandardConcessionSeatPrice);
// document.body.addEventListener("dblclick", getStandardChildSeatPrice);
// document.body.addEventListener("dblclick", getFirstClassAdultSeatPrice);
// document.body.addEventListener("dblclick", getFirstClassConcessionSeatPrice);
// document.body.addEventListener("dblclick", getFirstClassChildSeatPrice);
document.body.addEventListener("dblclick", getStandardAdultSeatPrice);
document.body.addEventListener("dblclick", calculatePrice);

function calculatePrice() {
  let standardAdultSeatPrice = getStandardAdultSeatPrice();
  console.log(typeof standardAdultSeatPrice);
  console.log(
    "The price of a standard adult seat for the selected sesion is: $" +
      standardAdultSeatPrice
  );
  let standardConcessionSeatPrice = getStandardConcessionSeatPrice();
  console.log(typeof standardConcessionSeatPrice);
  console.log(
    "The price of a standard concession seat for the selected sesion is: $" +
      standardConcessionSeatPrice
  );
  let standardChildSeatPrice = getStandardChildSeatPrice();
  console.log(typeof standardChildSeatPrice);
  console.log(
    "The price of a standard child seat for the selected sesion is: $" +
      standardChildSeatPrice
  );
  let firstClassAdultSeatPrice = getFirstClassAdultSeatPrice();
  console.log(typeof firstClassAdultSeatPrice);
  console.log(
    "The price of a first class adult seat for the selected sesion is: $" +
      firstClassAdultSeatPrice
  );
  let firstClassConcessionSeatPrice = getFirstClassConcessionSeatPrice();
  console.log(typeof firstClassConcessionSeatPrice);
  console.log(
    "The price of a first class concession seat for the selected sesion is: $" +
      firstClassConcessionSeatPrice
  );
  let firstClassChildSeatPrice = getFirstClassChildSeatPrice();
  console.log(typeof firstClassChildSeatPrice);
  console.log(
    "The price of a first class child seat for the selected sesion is: $" +
      firstClassChildSeatPrice
  );

  console.log(
    "The number of standard adult seats selected is: " + numStandardAdultSeats
  );
  console.log(
    "The number of standard concession seats selected is: " +
      numStandardConcessionSeats
  );
  console.log(
    "The number of standard child seats selected is: " + numStandardChildSeats
  );
  console.log(
    "The number of first class adult seats selected is: " +
      numFirstClassAdultSeats
  );
  console.log(
    "The number of first class concession seats selected is: " +
      numFirstClassConcessionSeats
  );
  console.log(
    "The number of first class child seats selected is: " +
      numFirstClassChildSeats
  );

  let totalCostOfStandardAdultSeats =
    standardAdultSeatPrice * numStandardAdultSeats;
  console.log(
    `Your subtotal for standard adult seats selected is: $${totalCostOfStandardAdultSeats} - $${standardAdultSeatPrice} x ${numStandardAdultSeats} seats`
  );
  let totalCostOfStandardConcessionSeats =
    standardConcessionSeatPrice * numStandardConcessionSeats;
  console.log(
    `Your subtotal for standard concession seats selected is: $${totalCostOfStandardConcessionSeats} - $${standardConcessionSeatPrice} x ${numStandardConcessionSeats} seats`
  );
  let totalCostOfStandardChildSeats =
    standardChildSeatPrice * numStandardChildSeats;
  console.log(
    `Your subtotal for standard child seats selected is: $${totalCostOfStandardChildSeats} - $${standardChildSeatPrice} x ${numStandardChildSeats} seats`
  );
  let totalCostOfFirstClassAdultSeats =
    firstClassAdultSeatPrice * numFirstClassAdultSeats;
  console.log(
    `Your subtotal for first class adult seats selected is: $${totalCostOfFirstClassAdultSeats} - $${firstClassAdultSeatPrice} x ${numFirstClassAdultSeats} seats`
  );
  let totalCostOfFirstClassConcessionSeats =
    firstClassConcessionSeatPrice * numFirstClassConcessionSeats;
  console.log(
    `Your subtotal for first class concession seats selected is: $${totalCostOfFirstClassConcessionSeats} - $${firstClassConcessionSeatPrice} x ${numFirstClassConcessionSeats} seats`
  );
  let totalCostOfFirstClassChildSeats =
    firstClassChildSeatPrice * numFirstClassChildSeats;
  console.log(
    `Your subtotal for first class child seats selected is: $${totalCostOfFirstClassChildSeats} - $${firstClassChildSeatPrice} x ${numFirstClassChildSeats} seats`
  );

  let totalPrice =
    totalCostOfStandardAdultSeats +
    totalCostOfStandardConcessionSeats +
    totalCostOfStandardChildSeats +
    totalCostOfFirstClassAdultSeats +
    totalCostOfFirstClassConcessionSeats +
    totalCostOfFirstClassChildSeats;

  console.log("The total price of your order is: $" + totalPrice);
  console.log(
    `The breakdown of your order is ${totalCostOfStandardAdultSeats} + ${totalCostOfStandardConcessionSeats} + ${totalCostOfStandardChildSeats} + ${totalCostOfFirstClassAdultSeats} + ${totalCostOfFirstClassConcessionSeats} + ${totalCostOfFirstClassChildSeats}`
  );
  return totalPrice;
}
