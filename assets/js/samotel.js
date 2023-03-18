jQuery(document).ready(($) => {
  const show_photos = (selected_filter = "*") => {
    $("#photoView").html("");
    let new_dump = photo_dump;

    if (selected_filter !== "*") {
      new_dump = photo_dump.filter((pic) => pic.cat === selected_filter);
    }

    if (new_dump.length) {
      new_dump.forEach((item) => {
        $("#photoView")
          .append(`<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
          <img
            class="object-fit-cover"
            src="${item.img}"
            alt="${item.alt}"
          />
        </div>`);
      });
    } else {
      $("#photoView").append('<p class="text-center">No Photos</p>');
    }
  };

  show_photos();

  $("#filterList button").click((e) => {
    $("#filterList button").removeClass("active");
    e.preventDefault();
    btn = $(e.target);
    btn.addClass("active");
    show_photos(btn.attr("data-filter"));
  });
});
