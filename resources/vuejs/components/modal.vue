<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">
        <slot name="modal-content">
          <div class="modal-container"></div>
        </slot>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "modal",
}
</script>
