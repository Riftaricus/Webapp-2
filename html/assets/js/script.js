document.addEventListener("DOMContentLoaded", () => {
  const stars = document.querySelectorAll(".star");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      // The clicked star index is the rating
      const rating = index;

      // Update star images
      stars.forEach((s, i) => {
        s.src = i <= rating 
          ? "assets/img/star.png"       // filled star
          : "assets/img/empty_star.png"; // empty star
      });
    });
  });
});
