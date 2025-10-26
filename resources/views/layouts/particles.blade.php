<div id="tsparticles" style="position:fixed; top:0; left:0; width:100%; height:100%; z-index:-1;"></div>
<script src="{{ asset('js/tsparticles.bundle.min.js') }}"></script>
<script>
    tsParticles.load("tsparticles", {
        background: {
            color: {
                value: "#ffffff" // putih
            }
        },
        particles: {
            number: {
                value: 50,
                density: {
                    enable: true,
                    area: 800
                }
            },
            color: {
                value: "#000000" // hitam
            },
            shape: {
                type: "circle"
            },
            opacity: {
                value: 0.8,
                random: false
            },
            size: {
                value: 3,
                random: true
            },
            links: {
                enable: true,
                distance: 150,
                color: "#000000", // warna link hitam
                opacity: 0.5,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
                direction: "none",
                random: false,
                straight: false,
                outModes: {
                    default: "bounce"
                }
            }
        },
        interactivity: {
            events: {
                resize: true
            },
            modes: {
                grab: {
                    distance: 140,
                    links: {
                        opacity: 0.8
                    }
                },
                push: {
                    quantity: 4
                }
            }
        },
        detectRetina: true
    });

</script>