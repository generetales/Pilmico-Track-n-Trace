package com.example.powlaw.myapplication;

import android.content.Context;
import android.os.AsyncTask;

import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

public class BackgroundTask extends AsyncTask<String, Void, String>{
    Context cnt;

    BackgroundTask(Context cnt){
        this.cnt = cnt;
    }
    @Override
    protected String doInBackground(String... params) {
        String insertURL = "http://192.168.168.192/android/select.php";
        String method = params[0];
        if (method.equals("add")){
            String fname = params[1],
                    lname = params[2];
            try {
                URL url = new URL(insertURL);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                OutputStream os = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(os, "UTF-8"));

                String data = URLEncoder.encode("fname","UTF-8") + "=" + URLEncoder.encode(fname, "UTF-8")+"&" +
                        URLEncoder.encode("lname","UTF-8") + "=" + URLEncoder.encode(lname, "UTF-8");

                bufferedWriter.write(data);
                bufferedWriter.flush();
                bufferedWriter.close();
                os.close();
                InputStream is = httpURLConnection.getInputStream();
                is.close();
                return "ADD SUCCESSFULLY!";
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        return null;
    }
}
