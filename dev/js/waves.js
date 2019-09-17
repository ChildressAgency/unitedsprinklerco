(function ($) {
  $.fn.waves = function () {
    const canvas = this[0];
    const ctx = canvas.getContext('2d');
    const PI2 = Math.PI * 2;

    let w = window.innerWidth;
    const h = 120;

    canvas.width = w;
    canvas.height = h;

    class Spring {
      constructor(index, x, y, k, damp, targetHeight, height) {
        this.index = index;
        this.x = x;
        this.y = y;

        this.k = k;
        this.damp = damp;

        this.targetHeight = targetHeight;
        this.height = height;

        this.acceleration = 0;
      }

      // Hooke's law
      update() {
        const displacement = this.targetHeight - this.height;

        this.acceleration += this.k * displacement;
        this.acceleration *= this.damp;

        this.height += this.acceleration;
      }

      get toY() {
        return this.y - this.height;
      }
    }

    const springs = [];
    const numSprings = 200;
    let springSpacing = w / (numSprings - 1);
    const springHeight = h * 0.5;
    const springConstant = 0.025;
    const springDamp = 0.9;
    const waveSpread = 0.3;

    const springY = h;
    let springX = 0;

    for (let i = 0; i < numSprings; i++) {

      const spring = new Spring(
        i,
        springX,
        springY,
        springConstant,
        springDamp,
        springHeight,
        springHeight
      );

      springs.push(spring);

      springX += springSpacing;
    }

    const clear = () => {
      ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    };

    const loop = () => {
      clear();

      springs.forEach((spring => {
        spring.update();
      }));

      const leftForces = [];
      const rightForces = [];

      for (let index = 1; index < springs.length - 1; index++) {
        const currentSpring = springs[index];
        const previousSpring = springs[index - 1];
        const nextSpring = springs[index + 1];

        leftForces[index] = waveSpread * (currentSpring.height - previousSpring.height);
        rightForces[index] = waveSpread * (currentSpring.height - nextSpring.height);
      }

      ctx.fillStyle = "#29296e";
      ctx.beginPath();
      ctx.moveTo(0, 0);

      for (let index = 0; index < springs.length; index++) {
        const currentSpring = springs[index];

        if (index > 0) {
          springs[index - 1].height += leftForces[index] || 0;
          springs[index - 1].acceleration += leftForces[index] || 0;
        }

        if (index < springs.length - 1) {
          springs[index + 1].height += rightForces[index] || 0;
          springs[index + 1].acceleration += rightForces[index] || 0;
        }

        ctx.lineTo(currentSpring.x, currentSpring.toY);
      }

      ctx.lineTo(w, 0);
      ctx.fill();
      ctx.closePath();

      requestAnimationFrame(loop);
    };

    loop();


    const onPointerMove = (e) => {
      const event = (e.touches && e.touches.length) ? e.touches[0] : e;
      const {clientX} = event;
      const waveWidth = w / numSprings;
      const springIndex = Math.round(clientX / waveWidth);

      springs[springIndex].acceleration = -h * 0.03;
    };

    document.body.addEventListener('mousemove', onPointerMove);
    document.body.addEventListener('touchmove', onPointerMove);

    window.addEventListener('resize', () => {
      w = window.innerWidth;
      canvas.width = w;
      springSpacing = w / (numSprings - 1);

      let springX = 0;
      for (let index = 1; index < springs.length; index++) {
        const currentSpring = springs[index];
        currentSpring.x = springX;
        springX += springSpacing;
      }
    });

    return this;
  };
})(jQuery);
