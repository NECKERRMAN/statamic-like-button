const rd_like = {
    init() {
        this.likes = JSON.parse(window.localStorage.getItem("likes")) ?? [];
        this.cacheDOMElements();
        this.registerEventListeners();
        this.highlightButtons();
    },
    cacheDOMElements() {
        /* TO DO CORRECT QS */
        this.btnLike = document.querySelectorAll('.btn_like');

    },
    registerEventListeners() {
        this.btnLike.forEach(btn => {
            btn.onclick = (e) => {
                const id = e.target.dataset.id;
                console.log(id)
                this.likeAction(id);
            }
        });
    },
    highlightButtons() {
        this.btnLike.forEach(btn => {
            const uuid = btn.dataset.id;

            if(!this.likes.includes(uuid)) return;

            btn.classList.add('background__heart--active');
        });
    },
    likeAction(id) {
        // If not already in array, add it
        if(!this.likes.includes(id)) {
            this.likes.push(id);
        } else {
            this.likes.splice(this.likes.indexOf(id), 1);
        }
        window.localStorage.setItem('likes', JSON.stringify(this.likes));
    }
}

window.onload = (e) => {
    console.log('loaded')
    rd_like.init();
};
