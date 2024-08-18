<template>
    <div class="col-lg-9">
        <div class="dashboard-content">
            <div class="my-profile" id="profile">
                <div class="profile-info">
                    <div class="common-card">
                        <div class="user-name media">
                            <div class="media-body">
                                <h5>Zack Lee <span class="label label-success">Real estate agent</span></h5>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <span data-bs-toggle="modal" data-bs-target="#edit-profile"
                                class="label label-light label-flat color-4">Edit</span>
                        </div>
                        <ul class="user-detail">
                            <li>
                                <Icon name="majesticons:map-marker-line" />
                                <span>Downers Grove, IL</span>
                            </li>
                            <li>
                                <Icon name="material-symbols:mail-outline-rounded" />
                                <span>zackle@gmail.com</span>
                            </li>
                            <li>
                                <Icon name="mdi:checkbox-marked-outline" />
                                <span>Licensed for 2 years</span>
                            </li>
                        </ul>
                        <p class="font-roboto">Residences can be classified by and how they are connected to neighbouring
                            residences and land.
                            Different types of housing tenure can be used for the same physical type.</p>
                    </div>
                    <PageUserPanelUserProfileAboutUser />
                </div>
            </div>
        </div>
    </div>
    <teleport to='body'>
        <Transition name="modals">
            <ElementModelsEditprofile />
        </Transition>
    </teleport>
</template>

<script setup lang="ts">

</script>

<style scoped></style>