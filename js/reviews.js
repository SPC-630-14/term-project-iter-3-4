$("#itemReviewForm").on("submit", function (e) {
  e.preventDefault();

  $.ajax({
    method: "POST",
    url: "php/reviews.php",
    data: $("form").serialize(),
    success: function (response) {
      console.log(response);
    },
    error: function (response) {
      console.log(response);
    },
  });
});

$("#showReviews").on("submit", function (e) {
  e.preventDefault();

  $.ajax({
    method: "POST",
    url: "php/showReviews.php",
    data: $("form").serialize(),
    success: function (data) {
      $("#SR").html(data);
    },
    error: function (response) {
      console.log(response);
    },
  });
});
