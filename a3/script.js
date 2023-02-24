/* Insert your javascript here */
window.onscroll = function () {
  // console.log("Win Y: " + window.scrollY);
  for (let i = 0; i < sections.length; i++) {
    let sectionTop = sections[i].offsetTop - 100;
    let sectionBottom = sections[i].offsetTop + sections[i].offsetHeight - 100;
    if (window.scrollY >= sectionTop && window.scrollY < sectionBottom) {
      navLinks[i].classList.add("current");
      //console.log(`Section ${sectionTop} ${sectionBottom}`);
    } else {
      navLinks[i].classList.remove("current");
    }
  }
};

const navLinks = document
  .getElementsByTagName("nav")[0]
  .getElementsByTagName("a");

const sections = document
  .getElementsByTagName("main")[0]
  .getElementsByTagName("section");

// console.log(navLinks);
// console.log(sections);
// console.log(
//   `${sections[0].offsetTop} ${sections[0].offsetTop + sections[0].offsetHeight}`
// );

// 5.1 REGEX Validation

// REGEX for booking name
// function validateBookingName() {
//   const bookingName = document.getElementById("name").value;
//   const regx = / /;

//   console.log("This is the booking name: " + bookingName);
// }

// // REGEX for phone number
// function validateBookingPhoneNumber() {
//   const bookingNumber = document.getElementById("mobile-number").value;
//   console.log("This is the booking mobile number: " + bookingNumber);
// }

// document.body.addEventListener("dblclick", validateBookingName);
// document.body.addEventListener("dblclick", validateBookingPhoneNumber);

// 5.2 Price Calculation Client Side

let sessionTime;
let dataPricing;

function getNumStandardAdultSeats() {
  let numStandardAdultSeats = 0;
  numStandardAdultSeats = parseInt(
    document.getElementById("standard-adult-seats").value
  );
  return numStandardAdultSeats;
  /*
  console.log(
    `The number of standard adult seats selected is ${numStandardAdultSeats}`
  );
  */
}

function getNumStandardConcessionSeats() {
  let numStandardConcessionSeats = 0;
  numStandardConcessionSeats = parseInt(
    document.getElementById("standard-concession-seats").value
  );
  return numStandardConcessionSeats;
  /*
  console.log(
    `The number of standard concession seats selected is ${numStandardConcessionSeats}`
  );
  */
}

function getNumStandardChildSeats() {
  let numStandardChildSeats = 0;
  numStandardChildSeats = parseInt(
    document.getElementById("standard-child-seats").value
  );
  return numStandardChildSeats;
  /*
  console.log(
    `The number of standard child seats selected is ${numStandardChildSeats}`
  );
  */
}

// First class

function getNumFirstClassAdultSeats() {
  let numFirstClassAdultSeats = 0;
  numFirstClassAdultSeats = parseInt(
    document.getElementById("first-class-adult-seats").value
  );
  return numFirstClassAdultSeats;
  /*
  console.log(
    `The number of first class adult seats selected is ${numFirstClassAdultSeats}`
  );
  */
}

function getNumFirstClassConcessionSeats() {
  let numFirstClassConcessionSeats = 0;
  numFirstClassConcessionSeats = parseInt(
    document.getElementById("first-class-concession-seats").value
  );
  return numFirstClassConcessionSeats;
  /*
  console.log(
    `The number of first class concession seats selected is ${numFirstClassConcessionSeats}`
  );
  */
}

function getNumFirstClassChildSeats() {
  let numFirstClassChildSeats = 0;
  numFirstClassChildSeats = parseInt(
    document.getElementById("first-class-child-seats").value
  );
  return numFirstClassChildSeats;
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
// document.body.addEventListener("dblclick", getStandardAdultSeatPrice);
// document.body.addEventListener("dblclick", calculatePrice);

function calculatePrice() {
  let numStandardAdultSeats = getNumStandardAdultSeats();
  let numStandardConcessionSeats = getNumStandardConcessionSeats();
  let numStandardChildSeats = getNumStandardChildSeats();
  let numFirstClassAdultSeats = getNumFirstClassAdultSeats();
  let numFirstClassConcessionSeats = getNumFirstClassConcessionSeats();
  let numFirstClassChildSeats = getNumFirstClassChildSeats();

  let standardAdultSeatPrice = getStandardAdultSeatPrice();

  let standardConcessionSeatPrice = getStandardConcessionSeatPrice();

  let standardChildSeatPrice = getStandardChildSeatPrice();

  let firstClassAdultSeatPrice = getFirstClassAdultSeatPrice();

  let firstClassConcessionSeatPrice = getFirstClassConcessionSeatPrice();

  let firstClassChildSeatPrice = getFirstClassChildSeatPrice();

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
  // console.log(
  //   `Your subtotal for standard adult seats selected is: $${totalCostOfStandardAdultSeats} - $${standardAdultSeatPrice} x ${numStandardAdultSeats} seats`
  // );
  let totalCostOfStandardConcessionSeats =
    standardConcessionSeatPrice * numStandardConcessionSeats;
  // console.log(
  //   `Your subtotal for standard concession seats selected is: $${totalCostOfStandardConcessionSeats} - $${standardConcessionSeatPrice} x ${numStandardConcessionSeats} seats`
  // );
  let totalCostOfStandardChildSeats =
    standardChildSeatPrice * numStandardChildSeats;
  // console.log(
  //   `Your subtotal for standard child seats selected is: $${totalCostOfStandardChildSeats} - $${standardChildSeatPrice} x ${numStandardChildSeats} seats`
  // );
  let totalCostOfFirstClassAdultSeats =
    firstClassAdultSeatPrice * numFirstClassAdultSeats;
  // console.log(
  //   `Your subtotal for first class adult seats selected is: $${totalCostOfFirstClassAdultSeats} - $${firstClassAdultSeatPrice} x ${numFirstClassAdultSeats} seats`
  // );
  let totalCostOfFirstClassConcessionSeats =
    firstClassConcessionSeatPrice * numFirstClassConcessionSeats;
  // console.log(
  //   `Your subtotal for first class concession seats selected is: $${totalCostOfFirstClassConcessionSeats} - $${firstClassConcessionSeatPrice} x ${numFirstClassConcessionSeats} seats`
  // );
  let totalCostOfFirstClassChildSeats =
    firstClassChildSeatPrice * numFirstClassChildSeats;
  // console.log(
  //   `Your subtotal for first class child seats selected is: $${totalCostOfFirstClassChildSeats} - $${firstClassChildSeatPrice} x ${numFirstClassChildSeats} seats`
  // );

  let totalPrice =
    totalCostOfStandardAdultSeats +
    totalCostOfStandardConcessionSeats +
    totalCostOfStandardChildSeats +
    totalCostOfFirstClassAdultSeats +
    totalCostOfFirstClassConcessionSeats +
    totalCostOfFirstClassChildSeats;

  // console.log("The total price of your order is: $" + totalPrice);
  // console.log(
  //   `The breakdown of your order is ${totalCostOfStandardAdultSeats} + ${totalCostOfStandardConcessionSeats} + ${totalCostOfStandardChildSeats} + ${totalCostOfFirstClassAdultSeats} + ${totalCostOfFirstClassConcessionSeats} + ${totalCostOfFirstClassChildSeats}`
  // );

  if (totalPrice !== 0 && totalPrice !== NaN) {
    document.getElementById("total-price").innerHTML =
      "Current Total: $" + totalPrice.toFixed(2);
  } else if (totalPrice === NaN) {
    document.getElementById("total-price").innerHTML = "Current Total: ";
  } else if (totalPrice === 0) {
    document.getElementById("total-price").innerHTML = "Current Total: ";
  }
}
