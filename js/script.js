setTimeout(() => {
  var tl = new TimelineMax();

  tl.to(".logo-parent", 4, { scale: 0.5, opacity: 1 })
    .to(".logo-tp", 5, { yPercent: -43 }, 0)
    .to(".main", 4, { boxShadow: "inset 0px 0px 200px rgb(0, 0, 0, 0.5)" }, 0)
    .to(".column-left", 2, { xPercent: 90, scale: 1 }, 1)
    .to(".column-right", 2, { xPercent: -90, scale: 1 }, 1)
    .from(".logo-text", 1, { opacity: 0, yPercent: 50 }, 3);

  setTimeout(() => {
    var tl = new TimelineMax();

    tl.to(".logo-parent", 2, { scale: 1, ease: Power4.easeInOut }, 0)
      .to(".main", 5, { boxShadow: "inset 0px 0px 0px rgb(0, 0, 0, 0.5)" }, 0)
      .to(
        ".column-left",
        2,
        { xPercent: -90, scale: 1.5, ease: Power4.easeInOut },
        0
      )
      .to(
        ".column-right",
        2,
        { xPercent: 90, scale: 1.5, ease: Power4.easeInOut },
        0
      )
      .to(".main", 1, { opacity: 0 }, 0.7);

      setTimeout(()=>{
window.location="./home"
      },2000)
  }, 5000);
}, 1000);
