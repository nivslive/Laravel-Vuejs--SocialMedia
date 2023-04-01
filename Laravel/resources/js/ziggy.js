const Ziggy = {"url":"http:\/\/localhost:8082","port":8082,"defaults":{},"routes":{"backpack.auth.login":{"uri":"admin\/login","methods":["GET","HEAD"]},"backpack.auth.logout":{"uri":"admin\/logout","methods":["GET","HEAD"]},"backpack.auth.register":{"uri":"admin\/register","methods":["GET","HEAD"]},"backpack.auth.password.reset":{"uri":"admin\/password\/reset","methods":["GET","HEAD"]},"backpack.auth.password.reset.token":{"uri":"admin\/password\/reset\/{token}","methods":["GET","HEAD"]},"backpack.auth.password.email":{"uri":"admin\/password\/email","methods":["POST"]},"backpack.dashboard":{"uri":"admin\/dashboard","methods":["GET","HEAD"]},"backpack":{"uri":"admin","methods":["GET","HEAD"]},"backpack.account.info":{"uri":"admin\/edit-account-info","methods":["GET","HEAD"]},"backpack.account.info.store":{"uri":"admin\/edit-account-info","methods":["POST"]},"backpack.account.password":{"uri":"admin\/change-password","methods":["POST"]},"user.index":{"uri":"admin\/user","methods":["GET","HEAD"]},"user.search":{"uri":"admin\/user\/search","methods":["POST"]},"user.showDetailsRow":{"uri":"admin\/user\/{id}\/details","methods":["GET","HEAD"]},"user.create":{"uri":"admin\/user\/create","methods":["GET","HEAD"]},"user.store":{"uri":"admin\/user","methods":["POST"]},"user.edit":{"uri":"admin\/user\/{id}\/edit","methods":["GET","HEAD"]},"user.update":{"uri":"admin\/user\/{id}","methods":["PUT"]},"user.destroy":{"uri":"admin\/user\/{id}","methods":["DELETE"]},"user.show":{"uri":"admin\/user\/{id}\/show","methods":["GET","HEAD"]},"message.index":{"uri":"admin\/message","methods":["GET","HEAD"]},"message.search":{"uri":"admin\/message\/search","methods":["POST"]},"message.showDetailsRow":{"uri":"admin\/message\/{id}\/details","methods":["GET","HEAD"]},"message.create":{"uri":"admin\/message\/create","methods":["GET","HEAD"]},"message.store":{"uri":"admin\/message","methods":["POST"]},"message.edit":{"uri":"admin\/message\/{id}\/edit","methods":["GET","HEAD"]},"message.update":{"uri":"admin\/message\/{id}","methods":["PUT"]},"message.destroy":{"uri":"admin\/message\/{id}","methods":["DELETE"]},"message.show":{"uri":"admin\/message\/{id}\/show","methods":["GET","HEAD"]},"subject.index":{"uri":"admin\/subject","methods":["GET","HEAD"]},"subject.search":{"uri":"admin\/subject\/search","methods":["POST"]},"subject.showDetailsRow":{"uri":"admin\/subject\/{id}\/details","methods":["GET","HEAD"]},"subject.create":{"uri":"admin\/subject\/create","methods":["GET","HEAD"]},"subject.store":{"uri":"admin\/subject","methods":["POST"]},"subject.edit":{"uri":"admin\/subject\/{id}\/edit","methods":["GET","HEAD"]},"subject.update":{"uri":"admin\/subject\/{id}","methods":["PUT"]},"subject.destroy":{"uri":"admin\/subject\/{id}","methods":["DELETE"]},"subject.show":{"uri":"admin\/subject\/{id}\/show","methods":["GET","HEAD"]},"chat.index":{"uri":"admin\/chat","methods":["GET","HEAD"]},"chat.search":{"uri":"admin\/chat\/search","methods":["POST"]},"chat.showDetailsRow":{"uri":"admin\/chat\/{id}\/details","methods":["GET","HEAD"]},"chat.create":{"uri":"admin\/chat\/create","methods":["GET","HEAD"]},"chat.store":{"uri":"admin\/chat","methods":["POST"]},"chat.edit":{"uri":"admin\/chat\/{id}\/edit","methods":["GET","HEAD"]},"chat.update":{"uri":"admin\/chat\/{id}","methods":["PUT"]},"chat.destroy":{"uri":"admin\/chat\/{id}","methods":["DELETE"]},"chat.show":{"uri":"admin\/chat\/{id}\/show","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"password.confirm":{"uri":"user\/confirm-password","methods":["POST"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.confirm":{"uri":"user\/confirmed-two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.secret-key":{"uri":"user\/two-factor-secret-key","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"rooms":{"uri":"room\/{slug}","methods":["GET","HEAD"]},"room":{"uri":"room\/{chat}\/{subject}","methods":["GET","HEAD"]},"room.post":{"uri":"room\/post","methods":["GET","HEAD"]},"subject.post":{"uri":"subject\/post","methods":["GET","HEAD"]},"message.post":{"uri":"message\/post","methods":["POST"]},"index":{"uri":"api\/chat","methods":["GET","HEAD"]},"store":{"uri":"api\/chat","methods":["POST"]},"show":{"uri":"api\/chat\/{}","methods":["GET","HEAD"]},"update":{"uri":"api\/chat\/{}","methods":["PUT","PATCH"]},"destroy":{"uri":"api\/chat\/{}","methods":["DELETE"]},"chat.subjects.index":{"uri":"api\/chat\/with-subjects\/chat\/{chat}\/subjects","methods":["GET","HEAD"]},"chat.subjects.store":{"uri":"api\/chat\/with-subjects\/chat\/{chat}\/subjects","methods":["POST"]},"chat.subjects.show":{"uri":"api\/chat\/with-subjects\/chat\/{chat}\/subjects\/{subject}","methods":["GET","HEAD"]},"chat.subjects.update":{"uri":"api\/chat\/with-subjects\/chat\/{chat}\/subjects\/{subject}","methods":["PUT","PATCH"]},"chat.subjects.destroy":{"uri":"api\/chat\/with-subjects\/chat\/{chat}\/subjects\/{subject}","methods":["DELETE"]},"resource.index":{"uri":"api\/resource","methods":["GET","HEAD"]},"resource.store":{"uri":"api\/resource","methods":["POST"]},"resource.show":{"uri":"api\/resource\/{resource}","methods":["GET","HEAD"]},"resource.update":{"uri":"api\/resource\/{resource}","methods":["PUT","PATCH"]},"resource.destroy":{"uri":"api\/resource\/{resource}","methods":["DELETE"]},"reaction.index":{"uri":"api\/reaction","methods":["GET","HEAD"]},"reaction.store":{"uri":"api\/reaction","methods":["POST"]},"reaction.show":{"uri":"api\/reaction\/{reaction}","methods":["GET","HEAD"]},"reaction.update":{"uri":"api\/reaction\/{reaction}","methods":["PUT","PATCH"]},"reaction.destroy":{"uri":"api\/reaction\/{reaction}","methods":["DELETE"]},"user-notification.index":{"uri":"api\/user-notification","methods":["GET","HEAD"]},"user-notification.store":{"uri":"api\/user-notification","methods":["POST"]},"user-notification.show":{"uri":"api\/user-notification\/{user_notification}","methods":["GET","HEAD"]},"user-notification.update":{"uri":"api\/user-notification\/{user_notification}","methods":["PUT","PATCH"]},"user-notification.destroy":{"uri":"api\/user-notification\/{user_notification}","methods":["DELETE"]},"user-friends.index":{"uri":"api\/user-friends","methods":["GET","HEAD"]},"user-friends.store":{"uri":"api\/user-friends","methods":["POST"]},"user-friends.show":{"uri":"api\/user-friends\/{user_friend}","methods":["GET","HEAD"]},"user-friends.update":{"uri":"api\/user-friends\/{user_friend}","methods":["PUT","PATCH"]},"user-friends.destroy":{"uri":"api\/user-friends\/{user_friend}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
