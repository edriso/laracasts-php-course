</div>

<script>
const userMenuBtn = document.querySelector('#user-menu-button');
const userMenu = document.querySelector('#user-menu');
const mobileMenuBtn = document.querySelector('#mobile-menu-button');
const mobileMenu = document.querySelector('#mobile-menu');

if (userMenuBtn) {
    userMenuBtn.addEventListener('click', () => {
        userMenu.classList.toggle('hidden');
    });
}

mobileMenuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});
</script>
</body>

</html>