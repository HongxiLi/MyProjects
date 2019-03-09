package group3.csye6200.order.model;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by hongxili on 4/5/18.
 */

public class Common {
    public static User currentUser;

    public static Request currentRequest;


    public static List<Food> myFoods= new ArrayList<>();

    public static final String DELETE="Delete";

    public static final String VIEWORDERDETAIL="View Detail";

    public static final String CANCEL="Cancel Order";

    public static final String EMAIL="View Receipt";

    public static final String ACCEPT="Accept Partial";

    public static void addFoods()
    {
        Food f1= new Food("French Fries",50);
        Food f2= new Food("Chickens",50);
        Food f3= new Food("Burgers",50);
        Food f4= new Food("Onion Rings",50);
        myFoods.add(f1);
        myFoods.add(f2);
        myFoods.add(f3);
        myFoods.add(f4);
    }

    public static void setMyFoods(List<Food> myFoods) {
        Common.myFoods = myFoods;
    }

    public static List<Food> getMyFoods() {
        return myFoods;
    }

    public static String convertCodeToStatus(String status)
    {
        if(status.equals("0"))
            return "Placed";
        else if(status.equals("1"))
            return "Preparing";
        else if(status.equals("2"))
            return "Cancelled";
        else if(status.equals("3"))
            return "Ready to pickup";
        else if(status.equals("4"))
            return "Partial Availability";
        else if(status.equals("5"))
            return "Placed Partial Order";
        else
            return "Shipped";
    }

}
