const cards = document.querySelectorAll('.card');
    const playbarImg = document.getElementById('playbar-img');
    const playbarTitle = document.getElementById('playbar-title');
    const playbarArtist = document.getElementById('playbar-artist');
    const audioPlayer = document.getElementById('audio-player');
    const audioSource = document.getElementById('audio-source');

    cards.forEach(card => {
        card.addEventListener('click', () => {
            const imgSrc = card.querySelector('img').src;
            const title = card.querySelector('h2').textContent;
            const artist = card.querySelector('p').textContent;

            playbarImg.src = imgSrc;
            playbarTitle.textContent = title;
            playbarArtist.textContent = artist;

            // Set the audio source (you'll need to replace this with your actual file paths)
            const audioPath = `assets/${title.toLowerCase().replace(/ /g, '-')}.mp3`;
            audioSource.src = audioPath;
            audioPlayer.load(); // Load the new source
            audioPlayer.play(); // Start playing
        });
    });

    document.getElementById('search-text').addEventListener('click', function() {
        var searchBox = document.getElementById('search-input');
        var searchBtn = document.querySelector('.search-btn');
        if (searchBox.classList.contains('hidden')) {
            searchBox.classList.remove('hidden');
            searchBtn.classList.remove('hidden');
            searchBox.focus();  // Auto-focus on the input when it appears
        } else {
            searchBox.classList.add('hidden');
            searchBtn.classList.add('hidden');
        }
    });
    
    