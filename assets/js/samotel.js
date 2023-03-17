jQuery(document).ready(($) => {
  console.log(photo_dump);
  const show_photos = (selected_filter = "*") => {
    $("#photoView").html("");
    let new_dump = photo_dump;

    if (selected_filter !== "*") {
      new_dump = photo_dump.filter((pic) => pic.cat === selected_filter);
    }

    if (new_dump.length) {
      new_dump.forEach((item) => {
        $("#photoView")
          .append(`<div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-1 mb-4">
          <img
            class="img-fluid"
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
    e.preventDefault();
    btn = $(e.target);
    show_photos(btn.attr("data-filter"));
  });
});
