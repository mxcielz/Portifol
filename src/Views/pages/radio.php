<!DOCTYPE html>
<html>
<head>
  <style>
    /* Hide default player */
    audio {
      display: none;
    }

    /* YouTube iframe (hidden) */
    #youtube-player {
      display: none;
    }

    /* Floating button with pulse animation */
    .radio-toggle-btn {
      position: fixed;
      top: 50%;
      right: 20px;
      transform: translateY(-50%);
      background: linear-gradient(135deg, rgb(33, 33, 33), rgb(0, 0, 0));
      color: white;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      font-size: 24px;
      cursor: pointer;
      z-index: 10001;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(135, 135, 135, 0.7);
      }
      70% {
        box-shadow: 0 0 0 10px rgba(142, 142, 142, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(37, 37, 37, 0);
      }
    }

    .radio-toggle-btn:hover {
      transform: translateY(-50%) scale(1.1);
      background: linear-gradient(135deg, rgb(78, 78, 78), rgb(0, 0, 0));
    }

    .radio-toggle-btn:active {
      transform: translateY(-50%) scale(0.95);
    }

    /* Sidebar with improved design */
    .radio-sidebar {
      position: fixed;
      top: 50%;
      right: -250px; /* Hidden initially */
      transform: translateY(-50%);
      background: linear-gradient(to bottom, #2c2c2c, #131313);
      color: white;
      padding: 20px;
      width: 220px;
      border-radius: 15px 0 0 15px;
      box-shadow: -5px 0 15px rgba(0, 0, 0, 0.5);
      transition: right 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      z-index: 10000;
      font-family: 'Arial', sans-serif;
    }

    /* When open */
    .radio-sidebar.active {
      right: 80px;
    }

    .radio-sidebar h4 {
      margin: 0 0 15px;
      font-size: 18px;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #cccccc;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      padding-bottom: 10px;
    }

    .station-name {
      font-size: 14px;
      text-align: center;
      margin-bottom: 15px;
      color: #ddd;
      font-style: italic;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .control-group {
      margin-bottom: 15px;
    }

    .control-label {
      display: block;
      margin-bottom: 5px;
      font-size: 12px;
      color: #bbb;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    .control-btn {
      background: rgba(255,255,255,0.1);
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 50px;
      cursor: pointer;
      font-size: 16px;
      flex: 1;
      margin: 0 5px;
      transition: all 0.2s;
    }

    .control-btn:first-child {
      margin-left: 0;
    }

    .control-btn:last-child {
      margin-right: 0;
    }

    .control-btn:hover {
      background: rgba(255,255,255,0.2);
      transform: translateY(-2px);
    }

    .control-btn:active {
      transform: translateY(1px);
    }

    .mute-btn {
      background: rgb(57, 57, 57);
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
    }

    .mute-btn:hover {
      background: rgb(72, 72, 72);
    }

    .mute-btn.muted {
      background: #555;
    }

    .volume-slider {
      width: 100%;
      height: 6px;
      -webkit-appearance: none;
      background: rgba(255,255,255,0.1);
      border-radius: 3px;
      outline: none;
    }

    .volume-slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: rgb(79, 79, 79);
      cursor: pointer;
      transition: all 0.2s;
    }

    .volume-slider::-webkit-slider-thumb:hover {
      transform: scale(1.2);
      background: #aaaaaa;
    }

    .volume-slider::-moz-range-thumb {
      width: 16px;
      height: 16px;
      border: none;
      border-radius: 50%;
      background: rgb(79, 79, 79);
    }

    .volume-display {
      text-align: right;
      font-size: 12px;
      color: #bbb;
      margin-top: 5px;
    }

    .status-indicator {
      width: 10px;
      height: 10px;
      background-color: #aaaaaa;
      border-radius: 50%;
      display: inline-block;
      margin-right: 5px;
      animation: blink 1.5s infinite;
    }

    @keyframes blink {
      0% { opacity: 0.4; }
      50% { opacity: 1; }
      100% { opacity: 0.4; }
    }

    .status-text {
      font-size: 12px;
      color: #bbb;
      text-align: center;
      margin-top: 10px;
    }

    /* YouTube URL input */
    .youtube-input-group {
      margin-top: 15px;
      padding-top: 15px;
      border-top: 1px solid rgba(255,255,255,0.1);
    }

    .youtube-input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 4px;
      color: white;
      font-size: 12px;
      margin-bottom: 8px;
    }

    .youtube-input:focus {
      outline: none;
      border-color: rgba(255,255,255,0.4);
    }

    .youtube-submit {
      width: 100%;
      padding: 8px;
      background: #444;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.2s;
    }

    .youtube-submit:hover {
      background: #555;
    }

    /* Progress bar */
    .progress-container {
      width: 100%;
      height: 4px;
      background: rgba(255,255,255,0.1);
      margin-top: 15px;
      border-radius: 2px;
      overflow: hidden;
      cursor: pointer;
    }

    .progress-bar {
      height: 100%;
      width: 0;
      background: linear-gradient(to right, #444, #777);
      transition: width 0.3s linear;
    }

    .progress-time {
      display: flex;
      justify-content: space-between;
      font-size: 10px;
      color: #999;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <!-- YouTube iframe API (hidden) -->
  <div id="youtube-player"></div>

  <!-- Floating button -->
  <button class="radio-toggle-btn" id="toggleRadio">🎵</button>

  <!-- Sidebar control panel -->
  <div class="radio-sidebar" id="radioSidebar">
    <h4>🎧 Audio Player</h4>
    <div class="station-name" id="songTitle">Carregando...</div>
    
    <div class="button-group">
      <button class="control-btn" id="prevSong">⏮️</button>
      <button class="control-btn" id="playPause">▶️</button>
      <button class="control-btn" id="nextSong">⏭️</button>
    </div>
    
    <button class="mute-btn" id="muteBtn">🔊</button>
    
    <div class="control-group">
      <div class="control-label">Volume</div>
      <input type="range" class="volume-slider" id="volumeSlider" min="0" max="100" step="1" value="70">
      <div class="volume-display" id="volumeDisplay">70%</div>
    </div>
    
    <div class="progress-container" id="progressContainer">
      <div class="progress-bar" id="progressBar"></div>
    </div>
    <div class="progress-time">
      <span id="currentTime">0:00</span>
      <span id="duration">0:00</span>
    </div>
    
    <div class="status-text">
      <span class="status-indicator"></span>
      <span id="statusText">Carregando...</span>
    </div>
    
    <div class="youtube-input-group">
      <div class="control-label">YouTube URL ou ID</div>
      <input type="text" class="youtube-input" id="youtubeInput" placeholder="Cole o URL do YouTube aqui">
      <button class="youtube-submit" id="loadYouTube">Carregar Áudio</button>
    </div>
  </div>

  <script>
    // DOM elements
    const volumeSlider = document.getElementById('volumeSlider');
    const volumeDisplay = document.getElementById('volumeDisplay');
    const toggleBtn = document.getElementById('toggleRadio');
    const sidebar = document.getElementById('radioSidebar');
    const playPauseBtn = document.getElementById('playPause');
    const statusText = document.getElementById('statusText');
    const songTitle = document.getElementById('songTitle');
    const prevSong = document.getElementById('prevSong');
    const nextSong = document.getElementById('nextSong');
    const muteBtn = document.getElementById('muteBtn');
    const progressBar = document.getElementById('progressBar');
    const progressContainer = document.getElementById('progressContainer');
    const currentTimeEl = document.getElementById('currentTime');
    const durationEl = document.getElementById('duration');
    const youtubeInput = document.getElementById('youtubeInput');
    const loadYouTubeBtn = document.getElementById('loadYouTube');
    
    // YouTube API variables
    let player;
    let playerReady = false;
    let currentVideoIndex = 0;
    let updateInterval;
    
    // Featured track - your requested song
    const featuredTrackId = 'Jeb1wo65Hxc';
    
    // Predefined YouTube videos playlist
    const playlist = [
      { id: featuredTrackId, title: 'Featured Track' }, // Will be updated with real title
      { id: 'tuDhJKENeN4', title: 'RAINING IN ＳＨＡＮＧＨＡＩ (Lofi HipHop)' },
      { id: 'PTN_aV4kNKM', title: 'RAINING IN ＹＯＫＯＨＡＭＡ (Lofi HipHop)' },
    ];
    
    // Initialize YouTube API
    function loadYouTubeAPI() {
      const tag = document.createElement('script');
      tag.src = 'https://www.youtube.com/iframe_api';
      const firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }
    
    // Create YouTube player when API is ready
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('youtube-player', {
        height: '0',
        width: '0',
        videoId: featuredTrackId,
        playerVars: {
          'playsinline': 1,
          'controls': 0,
          'disablekb': 1,
          'fs': 0
        },
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange,
          'onError': onPlayerError
        }
      });
    }
    
    // YouTube player ready
    function onPlayerReady(event) {
      playerReady = true;
      statusText.textContent = "Pronto para reproduzir";
      
      // Get the video title
      fetchVideoTitle(featuredTrackId)
        .then(title => {
          playlist[0].title = title;
          songTitle.textContent = title;
        })
        .catch(() => {
          songTitle.textContent = "Faixa Musical";
        });
      
      volumeSlider.value = player.getVolume();
      volumeDisplay.textContent = player.getVolume() + '%';
      
      // Auto-play the featured track
      setTimeout(() => {
        player.playVideo();
      }, 1000);
    }
    
    // YouTube player state changes
    function onPlayerStateChange(event) {
      switch(event.data) {
        case YT.PlayerState.PLAYING:
          playPauseBtn.textContent = "⏸️";
          statusText.textContent = "Reproduzindo...";
          startProgressUpdate();
          break;
        case YT.PlayerState.PAUSED:
          playPauseBtn.textContent = "▶️";
          statusText.textContent = "Pausado";
          stopProgressUpdate();
          break;
        case YT.PlayerState.ENDED:
          playNext();
          break;
        case YT.PlayerState.BUFFERING:
          statusText.textContent = "Carregando...";
          break;
        case YT.PlayerState.CUED:
          updateDuration();
          resetProgress();
          break;
      }
    }
    
    // YouTube player errors
    function onPlayerError(event) {
      statusText.textContent = "Erro ao carregar vídeo";
      console.error("YouTube player error:", event.data);
    }
    
    // Toggle sidebar visibility with animation
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('active');
      toggleBtn.style.transform = sidebar.classList.contains('active') 
        ? 'translateY(-50%) rotate(90deg)' 
        : 'translateY(-50%) rotate(0deg)';
    });
    
    // Play/Pause functionality
    playPauseBtn.addEventListener('click', togglePlayPause);
    
    function togglePlayPause() {
      if (!playerReady) return;
      
      const state = player.getPlayerState();
      if (state === YT.PlayerState.PLAYING) {
        player.pauseVideo();
      } else {
        player.playVideo();
      }
    }
    
    // Volume control with percentage display
    volumeSlider.addEventListener('input', () => {
      if (!playerReady) return;
      
      player.setVolume(volumeSlider.value);
      updateVolumeDisplay();
    });
    
    function updateVolumeDisplay() {
      if (!playerReady) return;
      
      volumeDisplay.textContent = `${player.getVolume()}%`;
    }
    
    // Mute/Unmute functionality
    muteBtn.addEventListener('click', () => {
      if (!playerReady) return;
      
      if (player.isMuted()) {
        player.unMute();
        muteBtn.textContent = '🔊';
        volumeSlider.style.opacity = '1';
      } else {
        player.mute();
        muteBtn.textContent = '🔇';
        volumeSlider.style.opacity = '0.5';
      }
      muteBtn.classList.toggle('muted', player.isMuted());
    });
    
    // Previous song
    prevSong.addEventListener('click', () => {
      if (!playerReady) return;
      
      currentVideoIndex = (currentVideoIndex - 1 + playlist.length) % playlist.length;
      loadVideo(playlist[currentVideoIndex].id, playlist[currentVideoIndex].title);
    });
    
    // Next song
    nextSong.addEventListener('click', playNext);
    
    function playNext() {
      if (!playerReady) return;
      
      currentVideoIndex = (currentVideoIndex + 1) % playlist.length;
      loadVideo(playlist[currentVideoIndex].id, playlist[currentVideoIndex].title);
    }
    
    // Progress bar click to seek
    progressContainer.addEventListener('click', (e) => {
      if (!playerReady) return;
      
      const rect = progressContainer.getBoundingClientRect();
      const pos = (e.clientX - rect.left) / rect.width;
      const duration = player.getDuration();
      player.seekTo(duration * pos, true);
    });
    
    // Load YouTube video from input
    loadYouTubeBtn.addEventListener('click', () => {
      const input = youtubeInput.value.trim();
      if (!input) return;
      
      // Extract video ID from URL or use as is
      let videoId = input;
      
      // Handle standard YouTube URLs
      if (input.includes('youtube.com/watch') || input.includes('youtu.be/')) {
        const url = new URL(input);
        if (input.includes('youtube.com/watch')) {
          videoId = url.searchParams.get('v');
        } else {
          videoId = url.pathname.slice(1);
        }
      }
      
      if (videoId) {
        fetchVideoTitle(videoId)
          .then(title => {
            loadVideo(videoId, title);
            
            // Add to playlist if not already there
            if (!playlist.some(item => item.id === videoId)) {
              playlist.push({ id: videoId, title: title });
              currentVideoIndex = playlist.length - 1;
            } else {
              // Find the index if already in playlist
              currentVideoIndex = playlist.findIndex(item => item.id === videoId);
            }
          })
          .catch(() => {
            loadVideo(videoId, 'YouTube Video');
          });
          
        // Clear input after loading
        youtubeInput.value = '';
      }
    });
    
    // Fetch video title from YouTube
    function fetchVideoTitle(videoId) {
      return new Promise((resolve, reject) => {
        fetch(`https://noembed.com/embed?url=https://www.youtube.com/watch?v=${videoId}`)
          .then(response => response.json())
          .then(data => {
            if (data.title) {
              resolve(data.title);
            } else {
              reject('No title found');
            }
          })
          .catch(error => {
            console.error('Error fetching video info:', error);
            reject(error);
          });
      });
    }
    
    // Load video by ID and title
    function loadVideo(videoId, title) {
      if (!playerReady) return;
      
      statusText.textContent = "Carregando...";
      player.loadVideoById(videoId);
      songTitle.textContent = title;
      resetProgress();
    }
    
    // Update progress bar regularly
    function startProgressUpdate() {
      stopProgressUpdate();
      updateInterval = setInterval(updateProgress, 1000);
      updateProgress();
    }
    
    function stopProgressUpdate() {
      if (updateInterval) {
        clearInterval(updateInterval);
      }
    }
    
    function updateProgress() {
      if (!playerReady) return;
      
      const currentTime = player.getCurrentTime();
      const duration = player.getDuration();
      if (duration) {
        const percentage = (currentTime / duration) * 100;
        progressBar.style.width = `${Math.min(percentage, 100)}%`;
        currentTimeEl.textContent = formatTime(currentTime);
        durationEl.textContent = formatTime(duration);
      }
    }
    
    function resetProgress() {
      progressBar.style.width = '0%';
      currentTimeEl.textContent = '0:00';
      updateDuration();
    }
    
    function updateDuration() {
      if (!playerReady) return;
      
      setTimeout(() => {
        if (player && player.getDuration) {
          durationEl.textContent = formatTime(player.getDuration());
        }
      }, 300);
    }
    
    // Format time in MM:SS
    function formatTime(seconds) {
      seconds = Math.floor(seconds);
      const minutes = Math.floor(seconds / 60);
      seconds = seconds % 60;
      return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }
    
    // Load API on page load
    loadYouTubeAPI();
    
    // Expose the YouTube API callback
    window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
  </script>
</body>
</html>