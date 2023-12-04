class ForgalomkorlatozosKep {
    constructor(src, x, y) {
        this.kep = document.createElement("img");
        this.kep.src = src;
        this.kep.style.position = "absolute";
        this.kep.style.left = x + "px";
        this.kep.style.top = y + "px";
        this.kep.style.width = 100 + "px";
        this.kep.style.height = 100 + "px";
        document.body.appendChild(this.kep);
    }

    mutat() {
        this.kep.style.visibility = "visible";
    }

    elrejt() {
        this.kep.style.visibility = "hidden";
    }
}