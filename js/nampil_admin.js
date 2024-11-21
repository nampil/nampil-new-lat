jQuery(document).ready(function ($) {
  let mediaUploader

  const videoCheckHidden = $('#hero-video-check')
  const videoCheckBox = $('#check-video')

  videoCheckBox.change(function () {
    if (this.checked) {
      $('#upload-button').attr('disabled', true)
      $('#upload-video-cover-button').attr('disabled', false)
      $('#upload-video-button').attr('disabled', false)
      $('#lat-video').removeClass('hide')
      $('#lat-video-cover-preview').removeClass('hide')
      $('#lat-hero-img-preview').addClass('hide')
      $('#lat-hero-img-layer1-preview').addClass('hide')
      $('#hero-title-preview').addClass('hide')
      $('#lat-hero-cta').addClass('hide')
      $('#hero-title').attr('disabled', true)
      $('#hero-cta').attr('disabled', true)
      $('#hero-cta-link').attr('disabled', true)
      $('#upload-hero-img-layer1-button').attr('disabled', true)
      $('#reset-hero-img-layer1-button').attr('disabled', true)
    } else {
      $('#upload-button').attr('disabled', false)
      $('#upload-video-cover-button').attr('disabled', true)
      $('#upload-video-button').attr('disabled', true)
      $('#lat-video').addClass('hide')
      $('#lat-video-cover-preview').addClass('hide')
      $('#lat-hero-img-preview').removeClass('hide')
      $('#lat-hero-img-layer1-preview').removeClass('hide')
      $('#hero-title-preview').removeClass('hide')
      $('#lat-hero-cta').removeClass('hide')
      $('#hero-title').attr('disabled', false)
      $('#hero-cta').attr('disabled', false)
      $('#hero-cta-link').attr('disabled', false)
      $('#upload-hero-img-layer1-button').attr('disabled', false)
      $('#reset-hero-img-layer1-button').attr('disabled', false)
    }
  })

  console.log(videoCheckHidden)

  if (videoCheckHidden.val() === '1') {
    $('#upload-button').attr('disabled', true)
    $('#upload-video-cover-button').attr('disabled', false)
    $('#upload-video-button').attr('disabled', false)
    $('#lat-video').removeClass('hide')
    $('#lat-video-cover-preview').removeClass('hide')
    $('#lat-hero-img-preview').addClass('hide')
    $('#lat-hero-img-layer1-preview').addClass('hide')
    $('#hero-title-preview').addClass('hide')
    $('#lat-hero-cta').addClass('hide')

    console.log('Si 1')
  } else {
    $('#upload-button').attr('disabled', false)
    $('#upload-video-cover-button').attr('disabled', true)
    $('#upload-video-button').attr('disabled', true)
    $('#lat-video').addClass('hide')
    $('#lat-video-cover-preview').addClass('hide')
    $('#lat-hero-img-preview').removeClass('hide')
    $('#lat-hero-img-layer1-preview').removeClass('hide')
    $('#hero-title-preview').removeClass('hide')
    $('#lat-hero-cta').removeClass('hide')
    console.log('No 1')
  }

  if ($('#lat-video')) {
    $('#lat-video').on('playing', function () {
      $('#lat-video-cover-preview').hide()
    })
  }

  $('#upload-button').on('click', function (e) {
    e.preventDefault()
    if (mediaUploader) {
      mediaUploader.open()
      return
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Hero Image',
      button: {
        text: 'Choose Image',
      },
      multiple: false,
    })

    mediaUploader.on('select', function () {
      const attachment = mediaUploader.state().get('selection').first().toJSON()

      $('#hero-image').val(attachment.url)
      $('#lat-hero-img-preview').attr('src', attachment.url)
    })

    mediaUploader.open()
  })

  let mediaVideoCoverUploader
  $('#upload-video-cover-button').on('click', function (e) {
    e.preventDefault()
    if (mediaVideoCoverUploader) {
      mediaVideoCoverUploader.open()
      return
    }
    mediaVideoCoverUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Hero Video Cover',
      button: {
        text: 'Choose Cover',
      },
      multiple: false,
    })

    mediaVideoCoverUploader.on('select', function () {
      const cover = mediaVideoCoverUploader
        .state()
        .get('selection')
        .first()
        .toJSON()
      $('#hero-video-cover').val(cover.url)
      $('#hero-video-cover-preview').attr('src', cover.url)
    })

    mediaVideoCoverUploader.open()
  })

  let videoUploader

  $('#upload-video-button').on('click', function (e) {
    e.preventDefault()
    console.log('abrir')

    if (videoUploader) {
      videoUploader.open()
      return
    }
    videoUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Hero Video',
      button: {
        text: 'Choose Video',
      },
      multiple: false,
    })

    videoUploader.on('select', function () {
      const video = videoUploader.state().get('selection').first().toJSON()
      console.log(video.url)

      $('#hero-video').val(video.url)
      $('#hero-video-preview').find('#main-video').attr('src', video.url)
    })

    videoUploader.open()
  })

  let layer1Uploader

  const resetHeroImgLayer1Btn = $('#reset-hero-img-layer1-button')
  if ($('#hero-img-layer1').val() === '') {
    resetHeroImgLayer1Btn.addClass('hide')
  } else {
    resetHeroImgLayer1Btn.removeClass('hide')
  }

  resetHeroImgLayer1Btn.on('click', function (e) {
    e.preventDefault()
    $('#hero-img-layer1').val('')
    $('#lat-hero-img-layer1-preview').attr('src', '')
    $(this).addClass('hide')
  })

  $('#upload-hero-img-layer1-button').on('click', function (e) {
    e.preventDefault()
    if (layer1Uploader) {
      layer1Uploader.open()
      return
    }
    layer1Uploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Layer1 Image',
      button: {
        text: 'Choose Image',
      },
      multiple: false,
    })
    layer1Uploader.on('select', function () {
      const layer1 = layer1Uploader.state().get('selection').first().toJSON()
      $('#hero-img-layer1').val(layer1.url)
      $('#lat-hero-img-layer1-preview').attr('src', layer1.url)
      resetHeroImgLayer1Btn.removeClass('hide')
    })
    layer1Uploader.open()
  })

  const heroTitlePreview = $('#hero-title-preview')
  const heroTitleInput = $('#hero-title')

  heroTitleInput.keyup(function () {
    const val = $(this).val()
    heroTitlePreview.text(val)
  })

  const heroCtaInput = $('#hero-cta')

  const heroCtaPreview = $('#lat-hero-cta')

  heroCtaInput.keyup(function () {
    const val = $(this).val()
    heroCtaPreview.text(val)
  })
})
