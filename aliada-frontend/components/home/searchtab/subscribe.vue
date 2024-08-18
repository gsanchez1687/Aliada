<template>
    <section class="subscribe-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="video-details">
                        <span class="label label-light label-flat color-4">{{ '#AliadaNews' }}</span>
                        <h2>{{ title }}</h2>
                        <p class="font-roboto">{{ details }}</p>
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Ingresa tu dirección de Email" required>
                            </div>
                            <button type="submit" class="btn btn-gradient color-4 btn-lg">{{ 'Suscribirme ahora' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script lang="ts" setup>
let title: string = 'Mantente al Día con Aliada';
let details: string = 'Suscríbete a nuestro boletín y recibe las últimas noticias y tendencias del mercado inmobiliario, consejos de inversión y destacados de nuestras propiedades más recientes. Con información actualizada y relevante, te ayudamos a tomar decisiones informadas en tu viaje inmobiliario.'
</script>

<style lang="scss" scoped></style>