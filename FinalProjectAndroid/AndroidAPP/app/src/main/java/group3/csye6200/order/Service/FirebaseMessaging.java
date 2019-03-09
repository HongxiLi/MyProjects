package group3.csye6200.order.Service;

import android.app.Notification;
import android.app.PendingIntent;
import android.content.Intent;
import android.media.RingtoneManager;
import android.net.Uri;
import android.os.Build;

import com.google.firebase.messaging.FirebaseMessagingService;
import com.google.firebase.messaging.RemoteMessage;

import java.util.Random;

import group3.csye6200.order.Helper.NotificationHelper;
import group3.csye6200.order.OrderStatus;
import group3.csye6200.order.model.Common;

/**
 * Created by hongxili on 4/7/18.
 */

public class FirebaseMessaging extends FirebaseMessagingService {

    @Override
    public void onMessageReceived(RemoteMessage remoteMessage) {
        super.onMessageReceived(remoteMessage);
        if(Build.VERSION.SDK_INT>=Build.VERSION_CODES.O)
        {
            sendNotificationAPI26(remoteMessage);
        }
    }

    private void sendNotificationAPI26(RemoteMessage remoteMessage) {
        RemoteMessage.Notification notification=remoteMessage.getNotification();
        String title=notification.getTitle();
        String content=notification.getBody();
        Intent intent=new Intent(this, OrderStatus.class);
        intent.putExtra("userPhone", Common.currentUser.getPhone());
        intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        PendingIntent pendingIntent=PendingIntent.getActivity(getBaseContext(),0,intent,PendingIntent.FLAG_ONE_SHOT);
        Uri defaultSoundUri= RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);

        NotificationHelper helper=new NotificationHelper(this);
        Notification.Builder builder=helper.orderEatChannel(title,content,pendingIntent,defaultSoundUri);
        helper.getManager().notify(new Random().nextInt(),builder.build());
    }
}
