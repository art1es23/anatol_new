// $(window).scroll(testScroll);
// var viewed = false;

// function isScrolledIntoView(elem) {
//   var docViewTop = $(window).scrollTop();
//   var docViewBottom = docViewTop + $(window).height();

//   var elemTop = $(elem).offset().top;
//   var elemBottom = elemTop + $(elem).height();

//   return elemBottom <= docViewBottom && elemTop >= docViewTop;
// }

// function testScroll() {
//   if (isScrolledIntoView($(".numbers")) && !viewed) {
//     viewed = true;
//     $(".value").each(function () {
//       $(this)
//         .prop("Counter", 0)
//         .animate(
//           {
//             Counter: $(this).text(),
//           },
//           {
//             duration: 2000,
//             easing: "linear",
//             step: function (now) {
//               $(this).text(Math.ceil(now));
//             },
//           }
//         );
//     });
//   }
// }

document.addEventListener("DOMContentLoaded", (evt) => {
  const elementTarget = document.querySelector(".anatol_map");
  const counterNumbers = document.querySelectorAll(".value");

  function numCounter(tag, maxCount, speed) {
    let initialNumber = 1;
    function counter() {
      tag.innerHTML = initialNumber;
      initialNumber++;
    }
    let counterDelay = setInterval(counter, speed);
    function totalTime() {
      clearInterval(counterDelay);
    }
    let totalPeriod =
      maxCount >= 500 ? speed * maxCount * 1.5 : speed * maxCount;
    setTimeout(totalTime, totalPeriod);

    // setInterval(totalTime, maxCount * speed);
  }

  function counter(event) {
    console.log("====================================");
    console.log("wind: ", window.scrollY);
    console.log("wind: ", elementTarget.offsetTop);
    console.log("====================================");
    if (window.scrollY > elementTarget.offsetTop) {
      counterNumbers.forEach((number) => {
        const initialNumber = number.textContent;
        let speed = initialNumber >= 500 ? 5 : 50;
        numCounter(number, initialNumber, speed);
      });

      window.removeEventListener("scroll", counter);
    }
  }

  window.addEventListener("scroll", counter);
});
