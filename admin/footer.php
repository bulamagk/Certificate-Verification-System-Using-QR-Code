</div>
      </div>
    </main>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/fontawesome/js/all.js"></script>
    <script src="../qrcode/dist/qrious.js"></script>
    <script>
      const hamburger = document.getElementById("hamburger");
      const aside = document.getElementById("aside");
      const main = document.getElementById("main");

      hamburger.addEventListener("click", () => {
        aside.style.display = "block";
      });

      const hideAside = () => {
        aside.style.display = "none";
      };

      aside.addEventListener("click", () => {
        window.innerWidth <= 768 ? hideAside() : null;
      });
      main.addEventListener("click", () => {
        window.innerWidth <= 768 ? hideAside() : null;
      });

      const showAside = () => {
        window.innerWidth > 800 ? (aside.style.display = "block") : null;
      };

      setInterval(() => {
        showAside();
      }, 100);

      $(document).ready(function () {
        $("#addCertificate").click(function () {
          $(".panel-body").load("add-certificate.html");
        });
      });
    </script>
  </body>
</html>
