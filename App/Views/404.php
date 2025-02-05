<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Introuvable</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-r from-indigo-600 to-indigo-900 text-white relative overflow-hidden">
<div class="text-center relative z-10">
    <h1 class="text-9xl font-bold" id="error-text">404</h1>
    <p class="text-2xl mt-4">Oops ! La page que vous cherchez n'existe pas.</p>
    <a href="/ZILOM_MVC/public/" class="mt-6 inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-indigo-500 hover:text-white transition duration-300">Retour à l'accueil</a>
</div>

<!-- Stickers Animation -->
<div class="absolute top-0 left-0 w-full h-full flex flex-wrap overflow-hidden pointer-events-none">
    <img src="https://cdn-icons-png.flaticon.com/512/742/742751.png" class="w-16 h-16 absolute random-sticker" style="top: 10%; left: 20%;">
    <img src="https://cdn-icons-png.flaticon.com/512/742/742753.png" class="w-20 h-20 absolute random-sticker" style="top: 50%; right: 10%;">
    <img src="https://cdn-icons-png.flaticon.com/512/742/742755.png" class="w-12 h-12 absolute random-sticker" style="bottom: 10%; left: 30%;">
</div>

<script>
    gsap.from("#error-text", { duration: 1, scale: 0.5, opacity: 0, ease: "bounce.out" });
    gsap.from("p", { duration: 1.5, opacity: 0, y: 50, delay: 0.5 });
    gsap.from("a", { duration: 1, opacity: 0, scale: 0.8, delay: 1 });

    // Animate Stickers
    gsap.to(".random-sticker", {
        y: "random(-30, 30)",
        x: "random(-30, 30)",
        rotation: "random(-10, 10)",
        duration: 2,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });
</script>
</body>
</html>
