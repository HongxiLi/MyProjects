package group3.csye6200.order.model;

/**
 * Created by hongxili on 4/5/18.
 */

public class User {
    private String name;
    private String password;
    private String phone;

    public User()
    {

    }
    public User(String name, String password)
    {
        this.name=name;
        this.password=password;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getPhone() {
        return phone;
    }

    public void setPhone(String phone) {
        this.phone = phone;
    }
}
