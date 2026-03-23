document.addEventListener("DOMContentLoaded", function () {
  const phrases = document.querySelectorAll(".hero-title-small");
  const accentLine = document.querySelector(".orange-accent-line");

  if (phrases.length === 0) return;

  let currentIndex = 0;

  // 1. Prepare all phrases
  phrases.forEach((phrase) => {
    const strText = phrase.textContent.trim();
    const splitText = strText.split("");
    phrase.textContent = "";

    splitText.forEach((char, i) => {
      const span = document.createElement("span");
      span.innerHTML = char === " " ? "&nbsp;" : char;
      span.style.setProperty("--i", i);
      phrase.appendChild(span);
    });
  });

  function showNextPhrase() {
    // 1. Reset everything
    phrases.forEach((p) => {
      p.style.display = "none";
      p.classList.remove("animate-letters", "animate-fade", "exit-fade");
    });

    // 2. Reset the line animation
    accentLine.classList.remove("line-active");

    const activePhrase = phrases[currentIndex];
    activePhrase.style.display = "flex";

    // Reflow trigger
    void activePhrase.offsetWidth;

    // 3. Trigger Text Animation
    if (currentIndex === 0) {
      activePhrase.classList.add("animate-fade");
    } else {
      activePhrase.classList.add("animate-letters");
    }

    // 4. Trigger Line Animation
    accentLine.classList.add("line-active");

    // 5. Sequence for Exit
    setTimeout(() => {
      activePhrase.classList.add("exit-fade");

      // Optional: Fade the line out with the text
      accentLine.classList.remove("line-active");

      setTimeout(() => {
        activePhrase.style.display = "none";
        currentIndex = (currentIndex + 1) % phrases.length;
        showNextPhrase();
      }, 500);
    }, 4000);
  }
  showNextPhrase();
});

document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
        threshold: 0.1 // Triggers when 10% of the element is visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stops watching once animated
            }
        });
    }, observerOptions);

    const revealElements = document.querySelectorAll('.js-reveal');
    revealElements.forEach(el => observer.observe(el));
});

function playMosserVideo(overlayElement) {
    // 1. Find the video relative to the clicked overlay
    const wrapper = overlayElement.closest('.video-wrapper');
    const video = wrapper.querySelector('video');

    if (video) {
        // 2. Play the video
        video.play();
        
        // 3. Show native controls so user can pause/seek later
        video.setAttribute('controls', 'true');
        
        // 4. Hide the entire overlay (button + halo)
        overlayElement.style.opacity = '0';
        overlayElement.style.pointerEvents = 'none'; // Prevents further clicks
        
        // Optional: Add a class for CSS transitions
        overlayElement.classList.add('is-playing');
    }
}

function playMosserVideo() {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('popupVideo');

    modal.style.display = "flex";
    video.play();
}

function closeMosserVideo() {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('popupVideo');

    modal.style.display = "none";
    video.pause();
    video.currentTime = 0; // Resets video for next time
}

// Close modal if user clicks anywhere outside the video
window.onclick = function(event) {
    const modal = document.getElementById('videoModal');
    if (event.target == modal) {
        closeMosserVideo();
    }
}
