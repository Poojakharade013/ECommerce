<?php include('layouts/header.php');?>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap");

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

img {
  width: 100%;
  display: block;
}



.parallax__container {
  height: 100vh;
  position: relative;
  overflow: hidden;
  background-color: #000000;
}

.parallax__container::after {
  content: "";
  position: absolute;
  bottom: 0;
  height: 5rem;
  width: 100%;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
}

.parallax__container img {
  position: absolute;
}

.parallax__container h1 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 100px;
  font-weight: 900;
}

.about {
  min-height: 125vh;
  background-color: #000000;
  display: grid;
  place-content: center;
}

.image__gallary {
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 3rem;
}

.image__card {
  opacity: 0;
}

.image__card img {
  border-radius: 1rem;
}

.details {
  max-width: 800px;
  margin: auto;
  margin-top: 8rem;
  font-size: 1.2rem;
  line-height: 2rem;
  text-align: center;
}

.footer__btn {
  max-width: 800px;
  margin: 2rem auto;
  text-align: center;
}

.learn__more {
  font-size: 1rem;
  font-weight: 600;
  outline: none;
  border: none;
  padding: 0.75rem 1rem;
  border-radius: 5px;
}
.image__card {
    opacity: 0;
    transform: scale(0.5);
    transition: opacity 0.5s ease, transform 0.5s ease;
  }

  .image__card.animate {
    opacity: 1;
    transform: scale(1);
  }
  #title,
  .details {
    color: white;
  }
    </style>


          <div class="parallax__container">
            <img src="assets/imgs/b-1.jpg" alt="parallax" />
            <img id="bg-2" src="assets/imgs/b-2.png" alt="parallax" />
            <h1 id="title">Adventure</h1>
            <img id="bg-3" src="assets/imgs/b-3.png" alt="parallax" />
          </div>
          <section class="about">
            <div class="image__gallary">
              <div class="image__card" id="image__card-1">
                <img src="assets/imgs/grid-1.jpg" alt="grid" />
              </div>
              <div class="image__card" id="image__card-2">
                <img src="assets/imgs/grid-2.jpg" alt="grid" />
              </div>
              <div class="image__card" id="image__card-3">
                <img src="assets/imgs/grid-3.jpg" alt="grid" />
              </div>
              <div class="image__card" id="image__card-4">
                <img src="assets/imgs/grid-4.jpg" alt="grid" />
              </div>
            </div>
            <div class="details">
              Snowboarding is a winter sport that involves riding a snowboard down a
              snow-covered slope or terrain. The rider stands on the snowboard with
              both feet attached to bindings and slides down the slope, making turns
              and performing tricks along the way.
            </div>
            <div class="footer__btn">
              <button class="learn__more">Learn More</button>
            </div>
          </section>
      
          <script>
            var title = document.getElementById("title");
            var bg_2 = document.getElementById("b-2");
            var bg_3 = document.getElementById("b-3");
      
            var image_card_1 = document.getElementById("image__card-1");
            var image_card_2 = document.getElementById("image__card-2");
            var image_card_3 = document.getElementById("image__card-3");
            var image_card_4 = document.getElementById("image__card-4");
      
            document.addEventListener("scroll", (event) => {
              var positionY = window.scrollY;
      
              title.style.fontSize = `${100 + positionY * 0.5}px`;
      
              bg_2.style.top = `-${positionY * 0.5}px`;
              bg_3.style.top = `-${positionY}px`;
              bg_3.style.scale = 1 + positionY * 0.001;
      
              image_card_1.style.transform = `translateY(${
                positionY * -0.5 + 400
              }px)`;
      
              image_card_2.style.transform = `translateY(${positionY * 0.1 + -50}px)`;
      
              image_card_3.style.transform = `translateY(${
                positionY * -0.1 + 100
              }px)`;
      
              image_card_4.style.transform = `translateY(${
                positionY * 0.2 + -125
              }px)`;
      
              var _newOpacity = positionY * 0.001;
              if (_newOpacity >= 0 && _newOpacity <= 1) {
                image_card_1.style.opacity = _newOpacity;
                image_card_2.style.opacity = _newOpacity;
                image_card_3.style.opacity = _newOpacity;
                image_card_4.style.opacity = _newOpacity;
              }
            });

            document.addEventListener("scroll", () => {
    const imageCards = document.querySelectorAll(".image__card");

    imageCards.forEach((card) => {
      const cardTop = card.getBoundingClientRect().top;
      const screenHeight = window.innerHeight;

      // Add or remove the 'animate' class based on the card's position on the screen
      if (cardTop < screenHeight * 0.75) {
        card.classList.add("animate");
      } else {
        card.classList.remove("animate");
      }
    });
  });
          </script>







<?php include('layouts/footer.php');?>