</div>

<script>
const userMenu = document.querySelector('#user-menu');
const userMenuBtn = document.querySelector('#user-menu-button');
if (userMenuBtn) {
    userMenuBtn.addEventListener('click', () => {
        userMenu.classList.toggle('hidden');
    });
}
</script>
</body>

</html>