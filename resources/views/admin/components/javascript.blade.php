<script>
    function Menu(x) {
        x.classList.toggle("change");
        x.classList.toggle("add");
        var menu = document.querySelector("#navbar");
        menu.classList.toggle("hidden");
    }
</script>

<script>
    const addUser = document.getElementById('addUser');
    const modalOpenButton = document.getElementById('addUser-open');
    const modalCloseButton = document.getElementById('addUser-close');

    modalOpenButton.addEventListener('click', () => {
        console.log('clicked');
        addUser.classList.remove('hidden');
        addUser.classList.add('block');
    });


    // Menyembunyikan elemen addUser saat klik di area lain atau di tombol yang sama
    document.addEventListener('click', (event) => {
        const isAddUserOpenButton = event.target.matches('#addUser-open');
        if (!isAddUserOpenButton && !addUser.contains(event.target)) {
            addUser.classList.remove('block');
            addUser.classList.add('hidden');
        }
    });
</script>

<script>
    const setUser = document.getElementById('setUser');
    const modalSetOpenButton = document.getElementById('setUser-open');

    modalSetOpenButton.addEventListener('click', () => {
        console.log('clicked');
        setUser.classList.remove('hidden');
        setUser.classList.add('block');
    });

    // Menyembunyikan elemen setUser saat klik di area lain atau di tombol yang sama
    document.addEventListener('click', (event) => {
        const isSetUserOpenButton = event.target.matches('#setUser-open');
        if (!isSetUserOpenButton && !setUser.contains(event.target)) {
            setUser.classList.remove('block');
            setUser.classList.add('hidden');
        }
    });
</script>
