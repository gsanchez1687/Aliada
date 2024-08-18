<template>
    <div class="timer">
        <ul>
            <li>
                <div class="counter">
                    <div>
                        <span id="days">{{ days }}</span>days
                    </div>
                </div>
            </li>
            <li>
                <div class="counter">
                    <div>
                        <span id="hours">{{ hours }}</span>Hour
                    </div>
                </div>
            </li>
            <li>
                <div class="counter">
                    <div>
                        <span id="minutes">{{ minutes }}</span>min
                    </div>
                </div>
            </li>
            <li>
                <div class="counter">
                    <div>
                        <span id="seconds">{{ seconds }}</span>sec
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
const td = ref<number>(0)
const days = ref<number>(0)
const hours = ref<number>(0)
const minutes = ref<number>(0)
const seconds = ref<number>(0)
const startTime = ref<string | number>('')
const endTime = ref<string | number>('')
function timer() {
    setInterval(() => {
        endTime.value = new Date().getTime()
        startTime.value = new Date('10 Jun, 2023 00:00:00').getTime(),
            td.value = endTime.value - startTime.value
        if (td.value >= 0) {
            seconds.value = Math.floor(td.value / 1000 % 60);
            minutes.value = Math.floor(td.value / 1000 / 60 % 60);
            hours.value = Math.floor(td.value / (1000 * 60 * 60) % 24);
            days.value = Math.floor(td.value / (1000 * 60 * 60 * 24));
        } else {
            seconds.value = minutes.value = hours.value = days.value = 0;
        }
    });

}
onMounted(() => {
    timer()
})
</script>

<style scoped></style>