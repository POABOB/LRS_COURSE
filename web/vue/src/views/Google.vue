<template>
  <div>
    <header class="bg-white shadow text-center">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Google Oauth</h1>
      </div>
    </header>
    <main>
      <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 text-center">
        <div class="px-4 py-6 sm:px-0">
            <p>學生Google 登入。學生可以用Google登入來辨別身份。</p>
            <button @click="OAuthLogin" class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-16  inline-flex items-center my-4">
                <span>Google 登入</span>
                </button>
        </div>
      </div>
    </main>
  </div>
</template>

<script>

export default {
    name: "Google",
    data() {
        return {}
    },
    methods: {
        async OAuthLogin() {
            try {
                const googleUser = await this.$gAuth.signIn()
                if (!googleUser) {
                    return null
                }
                console.log("name", googleUser.Ju.sf)
                console.log("email", googleUser.Ju.zv)
                console.log("token", googleUser.wc.id_token)
                console.log("expires_at", googleUser.wc.expires_at)
                const data = {
                    name: googleUser.Ju.sf,
                    email: googleUser.Ju.zv,
                    id: 0,
                    right: 'student',
                    expires_at: googleUser.wc.expires_at,
                    token: googleUser.wc.id_token
                }
                this.$store.dispatch('user/googleLogin', data).then(() => {
                    this.$router.push({ path: '/course/list' })
                }).catch((error) => {
                    console.log(error);
                })
                // this.user = googleUser.getBasicProfile().getEmail();
                // console.log("getId", this.user);
                // console.log("getBasicProfile", googleUser.getBasicProfile());
                // console.log("getAuthResponse", googleUser.getAuthResponse());
                // console.log(
                //     "getAuthResponse",
                //     this.$gAuth.instance.currentUser.get().getAuthResponse()
                // );
            } catch (error) {
                console.error(error)
                return null
            }
        },
        async handleClickGetAuthCode(){
            try {
                const authCode = await this.$gAuth.getAuthCode();
                console.log("authCode", authCode);
            } catch(error) {
                //on fail do something
                console.error(error);
                return null;
            }
        },
        async handleClickSignOut() {
            try {
                await this.$gAuth.signOut();
                console.log("isAuthorized", this.Vue3GoogleOauth.isAuthorized);
                this.user = "";
            } catch (error) {
                console.error(error);
            }
        },
        handleClickDisconnect() {
            window.location.href = `https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=${window.location.href}`;
        },
    },
}
</script>

<style scoped>

</style>